<?php
/**
 * create-docs.php
 *
 * Script that helps create providers and tests
 *
 * @package
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Embera\bin;

use ReflectionClass;
use RuntimeException;
use Embera\ProviderCollection\DefaultProviderCollection;
use Embera\ProviderCollection\SlimProviderCollection;

function getPropertyFromObject($obj, $prop)
{
    $reflection = new ReflectionClass($obj);
    $property = $reflection->getProperty($prop);
    $property->setAccessible(true);
    return $property->getValue($obj);
}

function getProvidersFromCollection($collection)
{
    return getPropertyFromObject($collection, 'providers');
}


if (php_sapi_name() !== 'cli') {
    exit;
}

date_default_timezone_set('UTC');
require __DIR__.'/../vendor/autoload.php';

$templateDir = __DIR__ . '/templates';
$providerDocDir = __DIR__ . '/../doc/providers';
$providerDir = __DIR__ . '/../src/Embera/Provider/';
$docDir = __DIR__ . '/../doc';

foreach ([$templateDir, $providerDir, $docDir, $providerDocDir] as $dir) {
    if (!is_dir($dir)) {
        throw new RuntimeException('ERROR: directory ' . $dir . ' doesnt exists');
    }
}

echo sprintf('Cleaning docs...') . PHP_EOL;
$files = glob($providerDocDir . '/*.md');
foreach($files as $file){
    if(is_file($file)) {
        unlink($file);
    }
}

echo sprintf('Generating documentation...') . PHP_EOL;
$docIndex = '# Supported Sites' . PHP_EOL . PHP_EOL;
$docIndex .= 'This is the complete list of supported oembed providers.' . PHP_EOL;
$docIndex .= 'I try to support all the providers listed on [oembed.com](https://oembed.com).' . PHP_EOL . PHP_EOL;

$docIndexFileName = $docDir . '/02-providers.md';
file_put_contents($docIndexFileName, $docIndex);

$defaultProviderCollectionProviders = getProvidersFromCollection(new DefaultProviderCollection());
$slimProviderCollectionProviders = getProvidersFromCollection(new SlimProviderCollection());

$processedProviders = [];
foreach ($defaultProviderCollectionProviders as $host => $provider) {

    $reflection = new ReflectionClass($provider);
    $providerName = $reflection->getShortName();

    if (isset($processedProviders[$providerName])) {
        continue;
    }

    $reflectionTest = new ReflectionClass($provider . 'Test');
    $reflectionTestObject = $reflectionTest->newInstanceWithoutConstructor();
    $tasks = getPropertyFromObject($reflectionTestObject, 'tasks');
    $validUrl = $tasks['valid_urls']['0'];

    $providerObject = $reflection->newInstanceArgs([$validUrl]);
    $providerDoc = $reflection->getDocComment();

    $providerHttps = $providerFake = $providerResponsive = 'NO';
    $providerCollections = $providerParams = $providerHosts = [];
    $providerLink = $providerLinkDocumentation = $providerDescription = $providerTodo = '';

    if (preg_match('~@link (.+)~i', $providerDoc, $m)) {
        $providerLink = $m['1'];
    }

    if (preg_match('~@todo (.+)~i', $providerDoc, $m)) {
        $providerTodo = $m['1'];
    } else {
        $providerTodo = 'No Information.';
    }

    if (preg_match('~@see (.+)~i', $providerDoc, $m)) {
        $providerLinkDocumentation = $m['1'];
    }

    if ($providerObject->hasHttpsSupport()) {
        $providerHttps = 'YES';
    }

    if ($providerObject->hasResponsiveSupport()) {
        $providerResponsive = 'YES';
    }

    if ($providerObject->getFakeResponse()) {
        $providerFake = 'YES';
    }

    $providerHosts = $providerObject::getHosts();
    $providerParams = getPropertyFromObject($providerObject, 'allowedParams');
    $providerCollections[] = 'DefaultProviderCollection';
    if (isset($slimProviderCollectionProviders[$host])) {
        $providerCollections[] = 'SlimProviderCollection';
    }

    $providerDescription = trim(str_replace(['*', '/'], "\n", $providerDoc));
    $providerDescription = trim(preg_replace('~\s+~', ' ', preg_replace('~(.+)@link.+~is', '$1', $providerDescription)));

    $providerData = [
        '{provider_name}' => $providerName,
        '{provider_description}' => wordwrap($providerDescription),
        '{provider_url}' => $providerLink,
        '{provider_doc_url}' => $providerLinkDocumentation,
        '{provider_https}' => $providerHttps,
        '{provider_fake}' => $providerFake,
        '{provider_responsive}' => $providerResponsive,
        '{provider_collections}' => implode(' , ', $providerCollections),
        '{provider_params}' => implode(' , ', $providerParams),
        '{provider_hosts}' => implode(' , ', $providerHosts),
        '{provider_todo}' => $providerTodo,
    ];

    echo sprintf('Creating provider documentation file %s in directory %s', $providerData['{provider_name}'] . '.md', $providerDocDir) . PHP_EOL;
    $data = file_get_contents($templateDir . '/ProviderDoc.tpl');
    $data = strtr($data, $providerData);
    $data = str_replace('[]()', 'NONE', $data);
    $data = str_replace('Provider ', "Provider\n", $data);
    $data = str_replace('{{meta.description}}', 'No Description', $data);

    // Remove empty todo
    $data = preg_replace('~\#\# Todo(\s+)No Information.~', '', $data);

    $fileName = $providerDocDir . '/' . $providerData['{provider_name}'] . '.md';
    file_put_contents($fileName, $data);
    file_put_contents($docIndexFileName, '- [' . $providerData['{provider_name}'] . '](providers/' . $providerData['{provider_name}'] . '.md)' . PHP_EOL, FILE_APPEND);
    $processedProviders[$providerName] = true;
}

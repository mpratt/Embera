<?php
/**
 * create-provider.php
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

use RuntimeException;

if (php_sapi_name() !== 'cli') {
    exit;
}

date_default_timezone_set('UTC');
require __DIR__.'/../vendor/autoload.php';

$usage = 'php create-provider --provider Hostname --host "hostname.com" --endpoint "endpoint.com"';
$templateDir = __DIR__ . '/templates';
$providerDir = __DIR__ . '/../src/Embera/Provider/';
$testProviderDir = __DIR__ . '/../tests/Embera/Provider/';

foreach ([$templateDir, $providerDir, $testProviderDir] as $dir) {
    if (!is_dir($dir)) {
        throw new RuntimeException('ERROR: directory ' . $dir . ' doesnt exists');
    }
}

$options = getopt('', [ 'host:', 'provider:', 'endpoint:']);
$required = [ 'host', 'provider', 'endpoint' ];
foreach ($required as $r) {
    if (!isset($options[$r])) {
        throw new RuntimeException('ERROR: Missing Arguments.' . PHP_EOL . 'Usage: ' . $usage);
    }
}

$translation = [
    '{host}' => $options['host'],
    '{host_escaped}' => preg_quote($options['host'], '~'),
    '{provider}' => $options['provider'],
    '{endpoint}' => $options['endpoint'],
];

echo sprintf('Creating provider file %s in directory %s', $options['provider'] . '.php', $providerDir) . PHP_EOL;
$data = file_get_contents($templateDir . '/Provider.tpl');
$data = strtr($data, $translation);
$fileName = $providerDir . '/' . $options['provider'] . '.php';
if (file_exists($fileName)) {
    throw new RuntimeException('ERROR: File ' . $fileName . ' already exists');
}

file_put_contents($fileName, $data);

echo sprintf('Creating provider file %s in directory %s', $options['provider'] . 'Test.php', $testProviderDir) . PHP_EOL;
$data = file_get_contents($templateDir . '/ProviderTest.tpl');
$data = strtr($data, $translation);
$fileName = $testProviderDir . '/' . $options['provider'] . 'Test.php';
if (file_exists($fileName)) {
    throw new RuntimeException('ERROR: File ' . $fileName . ' already exists');
}

file_put_contents($fileName, $data);

echo 'finished' . PHP_EOL;

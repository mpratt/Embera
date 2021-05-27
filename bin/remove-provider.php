<?php
/**
 * remove-provider.php
 *
 * Script that helps remove providers
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

$usage = 'php remove-provider --provider ProviderName';
$templateDir = __DIR__ . '/templates';
$providerDir = __DIR__ . '/../src/Embera/Provider';
$providerDirTest = __DIR__ . '/../tests/Embera/Provider';
$providerCollectionsDir = __DIR__ . '/../src/Embera/ProviderCollection';
$providerDocDir = __DIR__ . '/../doc/providers';

foreach ([$templateDir, $providerDir, $providerCollectionsDir, $providerDirTest, $providerDocDir] as $dir) {
    if (!is_dir($dir)) {
        throw new RuntimeException('ERROR: directory ' . $dir . ' doesnt exists');
    }
}

$options = getopt('', [ 'provider:' ]);
$required = [ 'provider' ];
foreach ($required as $r) {
    if (!isset($options[$r])) {
        throw new RuntimeException('ERROR: Missing Arguments.' . PHP_EOL . 'Usage: ' . $usage);
    }
}

$providerFile = $options['provider'] . '.php';
$providerFileTest = $options['provider'] . 'Test.php';
$providerDocument = $options['provider'] . '.md';

if (file_exists($providerDir . '/' . $providerFile)) {
    echo sprintf('Removing file %s', $providerDir . '/' . $providerFile) . PHP_EOL;
    unlink($providerDir . '/' . $providerFile);
}

if (file_exists($providerDirTest . '/' . $providerFileTest)) {
    echo sprintf('Removing file %s', $providerDirTest . '/' . $providerFileTest) . PHP_EOL;
    unlink($providerDirTest . '/' . $providerFileTest);
}

if (file_exists($providerDocDir . '/' . $providerDocument)) {
    echo sprintf('Removing file %s', $providerDocDir . '/' . $providerDocument) . PHP_EOL;
    unlink($providerDocDir . '/' . $providerDocument);
}

$collections = [
    'DefaultProviderCollection.php',
    'SlimProviderCollection.php',
];

foreach ($collections as $c) {
    $collectionFile = $providerCollectionsDir . '/' . $c;
    $data = file_get_contents($collectionFile);
    if (preg_match('~\'' . preg_quote($options['provider'], '~') . '\',~i', $data, $matches)) {
        echo sprintf('Removing from collection %s', $collectionFile) . PHP_EOL;
        $data = preg_replace('~\s*' . preg_quote($matches['0'], '~') . '\s*~i', '', $data);
        file_put_contents($collectionFile, $data);
    }
}

echo 'Updating docs' . PHP_EOL;
shell_exec('php create-docs.php');
echo 'finished' . PHP_EOL;

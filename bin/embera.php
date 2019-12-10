<?php
/**
 * embera.php
 *
 * CLI embera implementation
 *
 * @package
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Embera\bin;

use Embera\Embera;

if (php_sapi_name() !== 'cli') {
    exit;
}

date_default_timezone_set('UTC');
require __DIR__.'/../vendor/autoload.php';

$usage = 'php embera [-h] [--fake 0|1] [--array 0|1] [--responsive 0|1] [--https 0|1]';
$examples = [
    'php embera', 'php embera --fake 1', 'php embera --fake 1 --only-array 1 --responsive 1'
];

$options = getopt('h', [ 'fake:', 'array:', 'responsive:', 'https:']);
if (isset($options['h'])) {
    echo $usage . PHP_EOL;
    echo implode(PHP_EOL, $examples) . PHP_EOL;
    return ;
}

$fake = Embera::DISABLE_FAKE_RESPONSES;
if (!empty($options['fake'])) {
    $fake = Embera::ONLY_FAKE_RESPONSES;
}

$responsive = false;
if (!empty($options['responsive'])) {
    $responsive = true;
}

$https = false;
if (!empty($options['https'])) {
    $https = true;
}

$embera = new Embera([
    'fake_responses' => $fake,
    'responsive' => $responsive,
    'https' => $https,
]);

echo 'Enter the url/text you want to process: ' . PHP_EOL;
$line = fgets(STDIN);

echo PHP_EOL . 'Result:' . PHP_EOL;
if (!empty($options['array'])) {
    $data = $embera->getUrlData($line);
} else {
    $data = $embera->autoEmbed($line);
}

if ($embera->hasErrors()) {
    foreach ($embera->getErrors() as $error) {
        echo sprintf('Error: %s', $error) . PHP_EOL;
    }
}

if (is_string($data)) {
    echo $data;
} else {
    print_r($data);
}

echo PHP_EOL . 'The End.' . PHP_EOL;

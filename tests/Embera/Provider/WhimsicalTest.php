<?php
/**
 * WhimsicalTest.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Provider;

use Embera\ProviderTester;

/**
 * Test the Whimsical Provider
 */
final class WhimsicalTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://whimsical.com/how-oembed-works-7wvH66hEVUugCDkpPDbcuc',
            'https://whimsical.com/wine-and-cheese-pairing-mind-map-AFLejp4xXDtAjWLHjVCeyi',
            'https://whimsical.com/how-we-built-whimsical-Q5patpyGV3RDvkvkx1f6Ck',
        ],
        'invalid_urls' => [
            'https://whimsical.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Whimsical', [ 'width' => 480, 'height' => 270]);
    }
}

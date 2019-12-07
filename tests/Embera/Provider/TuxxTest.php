<?php
/**
 * TuxxTest.php
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
 * Test the Tuxx Provider
 */
final class TuxxTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.tuxx.be/nl/planning/',
            'https://www.tuxx.be/nl/personeel_en_organisatie/',
            'https://www.tuxx.be/nl/brieven/getuigschrift/',
        ],
        'invalid_urls' => [
            'https://www.tuxx.be/',
            'https://www.tuxx.be/nl/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Tuxx', [ 'width' => 480, 'height' => 270]);
    }
}

<?php
/**
 * UAPodTest.php
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
 * Test the UAPod Provider
 */
final class UAPodTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://uapod.univ-antilles.fr/video/0155-ec311-dm1-q2/',
        ],
        'invalid_urls' => [
            'https://uapod.univ-antilles.fr',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('UAPod', [ 'width' => 480, 'height' => 270]);
    }
}

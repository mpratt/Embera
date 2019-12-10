<?php
/**
 * WistiaTest.php
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
 * Test the Wistia Provider
 */
final class WistiaTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://home.wistia.com/medias/xfepf8u5c4',
        ],
        'invalid_urls' => [
            'https://home.wistia.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Wistia', [ 'width' => 480, 'height' => 270]);
    }
}

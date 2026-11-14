<?php
/**
 * Mirame360Test.php
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
 * Test the Mirame360 Provider
 */
final class Mirame360Test extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://mirame360.com/video/url/torres-de-serranos/',
        ],
        'invalid_urls' => [
            'https://mirame360.com',
            'https://mirame360.com/tour',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Mirame360', [ 'width' => 480, 'height' => 270]);
    }
}

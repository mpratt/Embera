<?php
/**
 * BoxOfficeBuzTest.php
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
 * Test the BoxOfficeBuz Provider
 */
final class BoxOfficeBuzTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://boxofficebuz.com/embed/video/jack-reacher-never-go-back-tv-spot-hunting',
        ],
        'invalid_urls' => [
            'https://boxofficebuz.com',
            'https://boxofficebuz.com/embed/video',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('BoxOfficeBuz', [ 'width' => 480, 'height' => 270]);
    }
}

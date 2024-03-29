<?php
/**
 * VidefitTest.php
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
 * Test the Videfit Provider
 */
final class VidefitTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://videfit.com/videos/651',
        ],
        'invalid_urls' => [
            'https://videfit.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Videfit', [ 'width' => 480, 'height' => 270]);
    }
}

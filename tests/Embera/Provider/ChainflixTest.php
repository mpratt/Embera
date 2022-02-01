<?php
/**
 * ChainflixTest.php
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
 * Test the Chainflix Provider
 */
final class ChainflixTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.chainflix.net/video/?contentId=1310',
        ],
        'invalid_urls' => [
            'https://www.chainflix.net/video/1310',
            'https://www.chainflix.net/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Chainflix', [ 'width' => 480, 'height' => 270]);
    }
}

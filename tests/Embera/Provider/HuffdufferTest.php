<?php
/**
 * HuffdufferTest.php
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
 * Test the Huffduffer Provider
 */
final class HuffdufferTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://huffduffer.com/jxpx777/125342',
            'https://huffduffer.com/tfehr/124690',
            'http://huffduffer.com/jasonmklug/124719',
        ],
        'invalid_urls' => [
            'http://huffduffer.com/',
            'http://huffduffer.com/signup/',
            'http://huffduffer.com/tags/productivity',
        ],
        'normalize_urls' => [
            'http://huffduffer.com/jasonmklug/124719?query=string' => 'https://huffduffer.com/jasonmklug/124719',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Huffduffer', [ 'width' => 480, 'height' => 270]);
    }
}

<?php
/**
 * BrightcoveTest.php
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
 * Test the Brightcove Provider
 */
final class BrightcoveTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://players.brightcove.net/1160438696001/RUsPQ8qzl_default/index.html?videoId=6327763506112',
        ],
        'invalid_urls' => [
            'https://www.brightcove.com',
            'https://players.brightcove.net/1160438696001/RUsPQ8qzl_default/index.html',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Brightcove', [ 'width' => 480, 'height' => 270]);
    }
}

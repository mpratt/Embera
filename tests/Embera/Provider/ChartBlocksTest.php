<?php
/**
 * ChartBlocksTest.php
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
 * Test the chartblocks.com Provider
 */
final class ChartBlocksTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'http://public.chartblocks.com/c/54271427c9a61d8e0c8b4567/',
            'https://public.chartblocks.com/c/54286c66c9a61d252ed5c969?query=string&format=json',
        ),
        'invalid_urls' => array(
            'http://public.chartblocks.com/',
            'http://public.chartblocks.com/latest/',
            'http://www.chartblocks.com/en/',
        ),
        'normalize_urls' => array(
            'https://public.chartblocks.com/c/54286c66c9a61d252ed5c969?query=string&format=json' => 'https://public.chartblocks.com/c/54286c66c9a61d252ed5c969',
        ),
        'fake_response' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('ChartBlocks', [ 'width' => 480, 'height' => 270]);
    }
}

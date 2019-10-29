<?php
/**
 * TwentyThreeHqTest.php
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
 * Test the youtube.com Provider
 */
final class TwentyThreeHqTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'http://www.23hq.com/nachbarnebenan/photo/61530160',
            'http://23hq.com/ddantgwyn/photo/61420250',
            'https://www.23hq.com/sascha-b/photo/60642021?with-query-string',
            'https://www.23hq.com/anita/album/3148631',
        ),
        'invalid_urls' => array(
            'https://www.23hq.com/sascha-b/photo/other-path/60642021?with-query-string',
            'https://www.23hq.com/anita/unknown-path/album/3148631',
        ),
        'normalize_urls' => array(
            'https://www.23hq.com/sascha-b/photo/60642021?with-query-string' => 'https://www.23hq.com/sascha-b/photo/60642021',
        ),
    );

    public function testProvider()
    {
        $this->validateProvider('TwentyThreeHq', [ 'width' => 480, 'height' => 270]);
    }
}

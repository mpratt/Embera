<?php
/**
 * TestServiceChatblocks.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceChatblocks extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://public.chartblocks.com/c/54271427c9a61d8e0c8b4567/',
            'http://public.chartblocks.com/c/54276401c9a61d9b168b4567/',
            'http://public.chartblocks.com/c/542711b8c9a61d110c8b4567',
            'http://public.chartblocks.com/c/54286c66c9a61d252ed5c969/',
            'http://public.chartblocks.com/c/54267c1ec9a61d5a7d8b4567/',
            'http://public.chartblocks.com/c/54290b36c9a61de63ad5c969',
            'http://public.chartblocks.com/c/54268e52c9a61dcd7e8b4567',
        ),
        'invalid' => array(
            'http://public.chartblocks.com/',
            'http://public.chartblocks.com/latest/',
            'http://www.chartblocks.com/en/',
        ),
        'fake' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('Chartblocks'); }
}

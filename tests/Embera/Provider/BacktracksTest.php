<?php
/**
 * BacktracksTest.php
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
 * Test the Backtracks Provider
 */
final class BacktracksTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://backtracks.fm/ycombinator/ycombinator/e/4-elon-musk-on-how-to-build-the-future',
            /* 'https://backtracks.fm/discover/s/the-joe-rogan-experience/6b8581415e041967/e/1411-robert-downey-jr/77d2d79586e78c01?oref=btdatadir', */
        ),
        'invalid_urls' => array(
            'https://backtracks.fm/pricing'
        ),
    );

    public function testProvider()
    {
        $this->validateProvider('Backtracks', [ 'width' => 480, 'height' => 270]);
    }
}

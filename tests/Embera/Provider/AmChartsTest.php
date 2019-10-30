<?php
/**
 * AmChartsTest.php
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
 * Test the AmCharts Provider
 */
final class AmChartsTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'http://live.amcharts.com/hlOWI',
            'http://live.amcharts.com/TY1Yj/',
            'http://live.amcharts.com/zkyZm/edit/',
        ),
        'invalid_urls' => array(
            'http://live.amcharts.com/new/',
            'http://live.amcharts.com/new/edit',
        ),
        'normalize_urls' => array(
            'http://live.amcharts.com/hlOWI' => 'https://live.amcharts.com/hlOWI',
            'http://live.amcharts.com/TY1Yj/edit' => 'https://live.amcharts.com/TY1Yj',
        ),
        'fake_response' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('AmCharts', [ 'width' => 480, 'height' => 270]);
    }
}

<?php
/**
 * TestServiceAmCharts.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceAmCharts extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://live.amcharts.com/NkMTE/',
            'http://live.amcharts.com/NjEwN',
            'http://live.amcharts.com/c1MGE/',
            'http://live.amcharts.com/hlOWI',
            'http://live.amcharts.com/TY1Yj/',
            'http://live.amcharts.com/zkyZm/edit/',
            'https://live.amcharts.com/YjRlZ/edit/',
            'http://live.amcharts.com/GIyNz/edit',
            'http://live.amcharts.com/DdmMD/',
        ),
        'invalid' => array(
            'http://live.amcharts.com/new/',
            'http://live.amcharts.com/new/edit',
            'http://live.amcharts.com/',
        ),
        'normalize' => array(
            'http://live.amcharts.com/hlOWI' => 'http://live.amcharts.com/hlOWI/',
            'http://live.amcharts.com/TY1Yj/' => 'http://live.amcharts.com/TY1Yj/',
            'http://live.amcharts.com/zkyZm/edit/' => 'http://live.amcharts.com/zkyZm/',
            'http://live.amcharts.com/TY1Yj/edit/stuff' => 'http://live.amcharts.com/TY1Yj/',
        ),
        'fake' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('AmCharts'); }
}

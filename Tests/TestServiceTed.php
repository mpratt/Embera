<?php
/**
 * TestServiceTed.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceTed extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.ted.com/talks/david_gallo_shows_underwater_astonishments.html',
            'http://www.ted.com/talks/michael_dickinson_how_a_fly_flies.html',
            'http://www.ted.com/talks/jon_ronson_strange_answers_to_the_psychopath_test.html',
            'http://www.ted.com/talks/lang/da/jill_bolte_taylor_s_powerful_stroke_of_insight.html',
            'http://www.ted.com/talks/lang/fa/jill_bolte_taylor_s_powerful_stroke_of_insight.html',
        ),
        'invalid' => array(
            'http://www.ted.com/',
            'http://www.ted.com/playlists/5/insects_are_awesome.html',
            'http://www.ted.com/tedx',
            'http://www.ted.com/talks',
        ),
        'fake' => array(
            'type' => 'video',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('Ted'); }
}

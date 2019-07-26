<?php
/**
 * TestServiceInfogram.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceInfogram extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://infogr.am/4feb214cdf29-5349',
            'https://infogr.am/top_10_eu_tech_exits_in_q1_2015_ranked_by_acquisition_size__ipo_valuation_in_euros',
            'https://infogr.am/da0b4c76-26be-4169-9550-992fc499e3d9',
            'http://infogr.am/12saeimas-velesanu-rezume?query-string',
            'https://infogr.am/the-2014-creative-jobs-report-fact-sheet/',
            'https://infogr.am/que_font_les_utilisateurs_de_google___en_',
        ),
        'invalid' => array(
            'https://infogr.am/featured',
            'https://infogr.am',
            'https://infogr.am/demo/the-2014-creative-jobs-report-fact-sheet',
            'https://infogr.am/brands',
            'https://infogr.am/brands',
        ),
    );

    public function testProvider() { $this->validateProvider('Infogram'); }
}

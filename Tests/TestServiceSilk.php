<?php
/**
 * TestServiceSilk.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceSilk extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://world.silk.co/explore/map/collection/country/numeric/total%20life%20expectancy/location/title/on/silk.co/pin/filter/matches/region/Africa',
            'https://women-in-film.silk.co/s/embed/stackchart/collection/bechdel-test-results-through-time/numeric/less-than-two-named-women-in-it/numeric/two-or-more-women-but-who-don%27t-talk-to-each-other/numeric/the-two-or-more-women-who-talk-to-each-other-but-only-discuss-men/numeric/passed',
            'http://russia-strikes-syria.silk.co/explore/iYgyzI7',
            'https://century-of-migration.silk.co/explore/wy1C01d',
            'http://lake-champlain-data.silk.co/explore/YNjH3nk',
            'http://tesla-superchargers.silk.co/explore/map/collection/tesla-superchargers\'-stations/column/city-us-state-country/column/superchargers-times/column/address/column/phone/numeric/superchargers/location/city-us-state-country/pin/filter/equals/us-state/California/suggestion/filter/equals/superchargers-times/suggestion/filter/equals/country/slice/0/1000'
        ),
        'invalid' => array(
            'https://www.silk.co/signin',
            'https://www.silk.co/',
            'https://silk.co/pricing',
            'https://uziel-862601.silk.co/',
            'https://docker.silk.co/page/Alejandro-Bonilla-116814562',
        ),
        'fake' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('Silk'); }
}
?>

<?php
/**
 * TestServiceCrowdRanking.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceCrowdRanking extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://crowdranking.com/crowdrankings/t470g0--best-tea',
            'http://crowdranking.com/crowdrankings/t272g0--tv-serien/',
            'http://crowdranking.com/crowdrankings/t485g0--what-makes-you-want-to-live-longer',
            'http://crowdranking.com/crowdrankings/t573g0--top-tourismusregionen-in-oesterreich',
            'http://www.crowdranking.com/crowdrankings/t537g0--die-besten-premium-kompaktkameras-2013',
            'http://crowdranking.com/crowdrankings/t564g0--was-mich-am-meisten-nervt',
            'http://c9ng.com/r/t537g0',
            'http://c9ng.com/r/t470g0',
        ),
        'invalid' => array(
            'http://crowdranking.com/groups/0',
            'http://crowdranking.com/groups/0?cat=creativity-diy',
            'http://crowdranking.com/groups/0?cat=people-celebrities',
            'http://crowdranking.com',
            'http://crowdranking.com/login',
        ),
        'normalize' => array(
            'http://c9ng.com/r/t470g0' => 'http://crowdranking.com/r/t470g0',
            'http://c9ng.com/r/t470g0/' => 'http://crowdranking.com/r/t470g0',
            'http://crowdranking.com/crowdrankings/t573g0--top-tourismusregionen-in-oesterreich' => 'http://crowdranking.com/crowdrankings/t573g0--top-tourismusregionen-in-oesterreich',
            'http://www.crowdranking.com/crowdrankings/t537g0--die-besten-premium-kompaktkameras-2013' => 'http://crowdranking.com/crowdrankings/t537g0--die-besten-premium-kompaktkameras-2013',
        ),
        'fake' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('CrowdRanking'); }
}

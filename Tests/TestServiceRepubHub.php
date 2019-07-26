<?php
/**
 * TestServiceRepubHub.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceRepubHub extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://repubhub.icopyright.net/freePost.act?tag=3.7212?icx_id=/content/thestar/news/gta/2015/10/30/how-toronto-kids-dressed-for-halloween-in-1929&urs=REPUBHUB',
            'https://repubhub.icopyright.net/freePost.act?tag=3.13278?icx_id=despite-reform-high-cost-living-puts-many-chinese-having-second-child-2163109&urs=REPUBHUB',
            'http://repubhub.icopyright.net/freePost.act?tag=3.15511?icx_id=60555313&urs=REPUBHUB',
            'https://repubhub.icopyright.net/freePost.act?tag=3.7280?icx_id=/news/2015/oct/30/senate-passes-debt-and-spending-hike-dead-night/&urs=REPUBHUB',
        ),
        'invalid' => array(
            'http://repubhub.icopyright.net/other-stuff/freePost.act?tag=3.15511?icx_id=60555313&urs=REPUBHUB',
            'http://repubhub.icopyright.net/other-stuff/freePost.act?',
        ),
    );

    public function testProvider() { $this->validateProvider('RepubHub'); }
}

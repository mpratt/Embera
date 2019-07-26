<?php
/**
 * TestServiceAolOn.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceAolOn extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://on.aol.com/video/plans-to-clone-john-lennon-using-one-of-his-teeth-517906689?icid=OnHomepageL1_Tag',
            'http://on.aol.com/video/three-good-news-stories-to-brighten-your-day-517906768',
            'https://on.aol.com/video/kid-president-meets-beyonc--517906781/',
            'http://on.aol.com/video/obama-comes-out-against-dog-breed-specific-legislation-517905316/',
            'http://on.aol.com/video/colo--lawmakers-ousted-over-gun-control-support-517929948?icid=OnHomepageC3_New_Img',
            'http://www.5min.com/video/obama-comes-out-against-dog-breed-specific-legislation-517905316',
            'http://5min.com/video/obama-comes-out-against-dog-breed-specific-legislation-517905316',
        ),
        'invalid' => array(
            'http://5min.com/obama-comes-out-against-dog-breed-specific-legislation-517905316',
            'http://on.aol.com/video/',
            'http://on.aol.com/channel/parenting',
            'http://on.aol.com/originals',
            'http://on.aol.com/show/CandidlyNicole-517742769',
            'http://on.aol.com/bubble/omg/1',
            'http://on.aol.com',
        ),
        'normalize' => array(
            'http://5min.com/video/obama-comes-out-against-dog-breed-specific-legislation-517905316' => 'http://on.aol.com/video/obama-comes-out-against-dog-breed-specific-legislation-517905316',
            'https://5min.com/video/obama-comes-out-against-dog-breed-specific-legislation-517905316' => 'http://on.aol.com/video/obama-comes-out-against-dog-breed-specific-legislation-517905316',
            'http://on.aol.com/video/plans-to-clone-john-lennon-using-one-of-his-teeth-517906689?icid=OnHomepageL1_Tag' => 'http://on.aol.com/video/plans-to-clone-john-lennon-using-one-of-his-teeth-517906689',
            'http://on.aol.com/video/plans-to-clone-john-lennon-using-one-of-his-teeth-517906689/' => 'http://on.aol.com/video/plans-to-clone-john-lennon-using-one-of-his-teeth-517906689',
        ),
        'fake' => array(
            'type' => 'video',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('AolOn'); }
}

<?php
/**
 * TestServiceMixCloud.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceMixCloud extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.mixcloud.com/quietmusic/quietmusic-august-18-hour-1-excerpt/',
            'http://www.mixcloud.com/sub88/mental-place-25/',
            'http://www.mixcloud.com/FluidRadio/casual-curses-a-mixtape-by-cooper-cult/',
            'http://mixcloud.com/aboveandbeyond/above-beyond-abgt-041/',
            'http://www.mixcloud.com/CarlCox/carl-cox-ibiza-the-revolution-unites-week-6',
            'http://www.mixcloud.com/TechnoLiveSets/josephcapriati-live-aquasella-festival-2013-spain-02-08-2013/',
            'http://www.mixcloud.com/truthoughts/tru-thoughts-presents-unfold-180813/',
        ),
        'invalid' => array(
            'http://www.mixcloud.com/truthoughts/',
            'http://www.mixcloud.com/categories/ambient-chillout/',
            'http://www.mixcloud.com/categories/comedy/',
            'http://www.mixcloud.com/about/',
            'http://www.mixcloud.com/upload/',
            'http://www.mixcloud.com/advertise/create/',
            'http://www.mixcloud.com/developers/documentation/',
        ),
    );

    public function testProvider() { $this->validateProvider('MixCloud'); }
}

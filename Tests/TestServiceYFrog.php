<?php
/**
 * TestServiceYFrog.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceYFrog extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://yfrog.us/jukynnj',
            'http://twitter.yfrog.com/es3r8kzj',
            'http://twitter.yfrog.com/hws60ilj?sa=0',
            'http://yfrog.com/odxklwraj',
            'http://yfrog.com/odxklwraj?sa=0',
            'http://twitter.yfrog.com/h835endj',
            'http://yfrog.us/mryll1j',
            'http://twitter.yfrog.com/kex9kulj?sa=0',
        ),
        'invalid' => array(
            'http://twitter.yfrog.com/user/IsabelVRuys/profile',
            'http://yfrog.com/about',
            'http://twitter.yfrog.com/',
            'http://yfrog.com/',
            'http://twitter.yfrog.com/page/faq',
            'http://blog.yfrog.com/jobs/',
            'http://twitter.yfrog.com/page/api',
        ),
        'normalize' => array(
            'http://twitter.yfrog.com/hws60ilj?sa=0' => 'http://twitter.yfrog.com/hws60ilj',
            'http://twitter.yfrog.com/hws60ilj?sa=1' => 'http://twitter.yfrog.com/hws60ilj',
            'http://twitter.yfrog.com/hws60ilj?sa=0&stuff=stuff' => 'http://twitter.yfrog.com/hws60ilj',
        )
    );

    public function testProvider() { $this->validateProvider('YFrog'); }
}

<?php
/**
 * TestServiceBambuser.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceBambuser extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://bambuser.com/v/3853413',
            'http://bambuser.com/v/3828591/',
            'http://bambuser.com/channel/peterpstuttgart',
            'http://www.bambuser.com/v/3828416',
            'http://bambuser.com/v/3847370',
            'http://bambuser.com/v/3901540',
        ),
        'invalid' => array(
            'http://bambuser.com/broadcasts',
            'http://bambuser.com/premium',
            'http://bambuser.com/tag/Business',
            'http://bambuser.com/tag/TMSO',
            'http://bambuser.com/',
        ),
        'normalize' => array(
            'http://www.bambuser.com/v/3847370/' => 'http://bambuser.com/v/3847370',
            'http://www.bambuser.com/v/3847370' => 'http://bambuser.com/v/3847370',
            'http://bambuser.com/channel/peterpstuttgart/broadcast/3847370' => 'http://bambuser.com/v/3847370',
            'http://bambuser.com/channel/peterpstuttgart/broadcast/3847370/other/stuff' => 'http://bambuser.com/v/3847370',
        ),
        'fake' => array(
            'type' => 'video',
            'html' => '<embed'
        )
    );

    public function testProvider() { $this->validateProvider('Bambuser'); }
}

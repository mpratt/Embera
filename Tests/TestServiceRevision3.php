<?php
/**
 * TestServiceRevision3.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceRevision3 extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://revision3.com/sesslerssomething/e3-2013-preview',
            'http://revision3.com/tbhs/wire-we-here',
            'http://www.revision3.com/technobuffalo/ask-the-buffalo-380-nokia-lumia-running-android',
            'http://revision3.com/sidescrollers/bosnian-bear-wrestling/',
            'http://revision3.com/rev3gamespreviews/watchdogs-new-interview',
            'http://revision3.com/screwattackhardnewsclip/fat-cat'
        ),
        'invalid' => array(
            'http://revision3.com/host/anthony-carboni',
            'http://revision3.com/host/adam-sessler/',
            'http://revision3.com/host/tara-long',
            'http://revision3.com/network/games/',
            'http://revision3.com/network/sharkweek',
            'http://www.revision3.com/tbhs/',
            'http://revision3.com/anniesbits',
            'http://revision3.com/where',
            'http://revision3.com/advertise/contact/'
        ),
        'normalize' => array(
            'http://revision3.com/sesslerssomething/e3-2013-preview' => 'http://revision3.com/sesslerssomething/e3-2013-preview',
            'http://www.revision3.com/technobuffalo/ask-the-buffalo-380-nokia-lumia-running-android' => 'http://www.revision3.com/technobuffalo/ask-the-buffalo-380-nokia-lumia-running-android',
        )
    );

    public function testProvider() { $this->validateProvider('Revision3'); }
}

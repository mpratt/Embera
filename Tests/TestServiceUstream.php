<?php
/**
 * TestServiceUstream.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceUstream extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.ustream.tv/channel/americatv2oficial',
            'http://www.ustream.tv/usbc',
            'http://www.ustream.tv/creativelive-3',
            'http://www.ustream.tv/creativeLIVE-rebroadcast',
            'https://www.ustream.tv/creativeLIVE-rebroadcast',
            'http://www.ustream.tv/channel/cbc-tv',
            'http://ustream.com/KTNKENYALIVE',
            'http://www.ustream.tv/channel/radio-unilatina-en-vivo',
        ),
        'invalid' => array(
            'http://ustre.am/142lz',
            'http://www.ustream.tv',
            'http://www.ustream.tv/channel/radio-unilatina-en-vivo/other-stuff',
            'https://www.ustream.tv/platform/pro#itm_source=footer&itm_medium=pro_link&itm_content=Pro Broadcasting&itm_campaign=footer',
            'https://www.ustream.tv/platform/plans',
            'http://www.ustream.tv/howto',
            'http://www.ustream.com/howto',
        ),
    );

    public function testProvider() { $this->validateProvider('Ustream'); }
}

<?php
/**
 * TestServiceReverbnation.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceReverbnation extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.reverbnation.com/oscarattack/song/12175154-asdasd',
            'https://www.reverbnation.com/monogem',
            'https://reverbnation.com/blackoutparty',
            'https://www.reverbnation.com/umphreysmcgee/song/23964777-bad-friday',
            'https://reverbnation.com/umphreysmcgee/songs/23964733-no-diablo',
            'http://www.reverbnation.com/barbarianus',
        ),
        'invalid' => array(
            'https://www.reverbnation.com/band-promotion',
            'https://www.reverbnation.com/main/charts',
            'https://reverbnation.com/copyright',
            'https://www.reverbnation.com/',
            'http://www.reverbnation.com/industryprofessionals',
            'https://www.reverbnation.com/page_object/page_object_photos/artist_151144?sel_photo_id=19161456',
        )
    );

    public function testProvider() { $this->validateProvider('Reverbnation'); }
}
?>

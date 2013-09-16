<?php
/**
 * TestServiceSoundCloud.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceSoundCloud extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://soundcloud.com/lospetitfellas/ser-libre-ft-alejandro-cole',
            'https://www.soundcloud.com/lospetitfellas/1150pm/',
            'https://soundcloud.com/lospetitfellas/sets/queridofrankie/',
            'https://www.soundcloud.com/comedy-central/the-unf-kables-dave-attell/',
            'https://soundcloud.com/smodco/babbleon-136',
            'https://soundcloud.com/smodco/isellcomics-93',
            'https://soundcloud.com/groups/rap-hiphop/',
            'https://soundcloud.com/groups/house-dj-sets',
            'https://soundcloud.com/tyrantofdeath/injection-remastered-2013/',
            'https://soundcloud.com/fernandomeira',
        ),
        'invalid' => array(
            'https://soundcloud.com/explore',
            'https://soundcloud.com/groups',
            'https://soundcloud.com',
            '',
        ),
    );

    public function testProvider() { $this->validateProvider('SoundCloud'); }
}
?>

<?php
/**
 * TestServiceShortNote.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceShortNote extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://www.shortnote.jp/view/notes/AAzbJ67b',
            'https://shortnote.jp/view/notes/AEKcSEt9/',
            'http://www.shortnote.jp/view/notes/ANAUuNRF',
            'http://shortnote.jp/view/notes/ANe9OZT6',
        ),
        'invalid' => array(
            'https://www.shortnote.jp/',
            'http://www.shortnote.jp/view/notes/ANAUuNRF/embed',
            'http://shortnote.jp/help/',
            'http://shortnote.jp/',
        ),
        'fake' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('ShortNote'); }
}
?>

<?php
/**
 * TestServiceViddler.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceViddler extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.viddler.com/v/a695c468',
            'http://www.viddler.com/v/a695c468/lightbox?autoplay=1',
            'http://www.viddler.com/v/528b194c/otherStuff/lightbox',
            'http://viddler.com/embed/4c57d97a/lightbox',
            'http://viddler.com/v/4c57d97a/lightbox',
            'http://viddler.com/v/c83cacd4'
        ),
        'invalid' => array(
            'http://viddler.com/invalidstuff/a695c468',
            'http://www.viddler.com/v/zxsdg9',
            'http://www.viddler.com/player/528b194c/otherStuff/lightbox',
            'http://viddler.com/v/',
        ),
        'normalize' => array(
            'http://www.viddler.com/v/a695c468' => 'http://www.viddler.com/v/a695c468',
            'http://www.viddler.com/v/a695c468/' => 'http://www.viddler.com/v/a695c468',
            'http://www.viddler.com/v/528b194c/otherStuff/lightbox' => 'http://www.viddler.com/v/528b194c',
            'http://viddler.com/embed/4c57d97a/lightbox' => 'http://www.viddler.com/v/4c57d97a',
            'http://viddler.com/embed/4c57d97a/' => 'http://www.viddler.com/v/4c57d97a',
        ),
        'fake' => array(
            'type' => 'video',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('Viddler'); }
}

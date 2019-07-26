<?php
/**
 * TestServiceCodepoints.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceCodepoints extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://codepoints.net/U+FEB9',
            'https://codepoints.net/U+27F4/',
            'https://www.codepoints.net/U+2425',
            'https://codepoints.net/U+20B4',
            'http://codepoints.net/U+1E46',
        ),
        'invalid' => array(
            'http://codepoints.net/',
            'https://codepoints.net/basic_multilingual_plane',
            'https://codepoints.net/scripts',
        ),
        'fake' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('Codepoints'); }
}

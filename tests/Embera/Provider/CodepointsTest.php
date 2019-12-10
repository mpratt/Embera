<?php
/**
 * CodepointsTest.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Provider;

use Embera\ProviderTester;

/**
 * Test the codepoints.net Provider
 */
final class CodepointsTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://codepoints.net/U+FEB9',
            'https://codepoints.net/U+27F4/',
            'https://www.codepoints.net/U+2425',
            'https://codepoints.net/U+20B4',
            'http://codepoints.net/U+1E46',
        ),
        'invalid_urls' => array(
            'http://codepoints.net/',
            'https://codepoints.net/basic_multilingual_plane',
            'https://codepoints.net/scripts',
        ),
        'normalize_urls' => array(
            'http://www.codepoints.net/U+2425?query=string' => 'https://www.codepoints.net/U+2425',
            'http://codepoints.net/U+2425?query=string' => 'https://codepoints.net/U+2425',
        ),
        'fake_response' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('Codepoints', [ 'width' => 480, 'height' => 270]);
    }
}

<?php
/**
 * CodeHSTest.php
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
 * Test the CodeHS Provider
 */
final class CodeHSTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://www.codehs.com/editor/share_abacus/xtOPDik2wNFjSDUoyl2T?query=string'
        ),
        'invalid_urls' => array(
            'https://codehs.com',
            'http://codehs.com/stuff/share_abacus/xtOPDik2wNFjSDUoyl2T',
        ),
        'normalize_urls' => array(
            'http://www.codehs.com/editor/share_abacus/xtOPDik2wNFjSDUoyl2T/?query=string' => 'https://www.codehs.com/editor/share_abacus/xtOPDik2wNFjSDUoyl2T',
        ),
    );

    public function testProvider()
    {
        $this->validateProvider('CodeHS', [ 'width' => 480, 'height' => 270]);
    }
}

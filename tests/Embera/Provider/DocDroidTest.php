<?php
/**
 * DocDroidTest.php
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
 * Test the DocDroid Provider
 */
final class DocDroidTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://docdro.id/hptvUCe'
        ),
        'invalid_urls' => array(
            'https://www.docdroid.net/hptvUCe/other/example-document.docx.html',
            'http://docdroid.net',
        ),
        'normalize_urls' => array(
            'http://docdro.id/hptvUCe' => 'https://docdroid.net/hptvUCe/sample.pdf'
        ),
        'fake_response' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->markTestIncomplete('We need a sample url but document uploads are only available for subscribers. (DocDroid)');
        // $this->validateProvider('DocDroid', [ 'width' => 480, 'height' => 270]);
    }
}

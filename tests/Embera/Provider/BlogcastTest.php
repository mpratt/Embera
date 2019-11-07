<?php
/**
 * BlogcastTest.php
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
 * Test the Blogcast Provider
 */
final class BlogcastTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://blogcast.host/embedly/5/?query=string',
            'http://www.blogcast.host/embed/1?query=string',
        ),
        'invalid_urls' => array(
            'http://www.blogcast.host/embedder/1?query=string',
            'http://blogcast.host',
        ),
        'normalize_urls' => array(
            'http://www.blogcast.host/embed/1?query=string' => 'https://blogcast.host/embed/1',
        ),
        'fake_response' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('Blogcast', [ 'width' => 480, 'height' => 270]);
    }
}

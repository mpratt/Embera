<?php
/**
 * CodeSandboxTest.php
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
 * Test the codesandbox.io Provider
 */
final class CodeSandboxTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://codesandbox.io/embed/musing-kare-4fblz',
            'http://www.codesandbox.io/s/psycho-meme-gen-hm4qo/'
        ),
        'invalid_urls' => array(
            'https://codesandbox.io/',
            'https://codesandbox.io/blog'
        ),
        'normalize_urls' => array(
            'http://www.codesandbox.io/s/floating-diamonds-prb9t/?from-embed' => 'https://codesandbox.io/s/floating-diamonds-prb9t',
        ),
        'fake_response' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('CodeSandbox', [ 'width' => 480, 'height' => 270]);
    }
}

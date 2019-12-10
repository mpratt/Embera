<?php
/**
 * MermaidInkTest.php
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
 * Test the MermaidInk Provider
 */
final class MermaidInkTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://mermaid.ink/img/eyJjb2RlIjoiZ3JhcGggVERcbiAgQVtBXSAtLT4gQihCKVxuXHRcdCIsIm1lcm1haWQiOnsidGhlbWUiOiJkZWZhdWx0In19',
        ],
        'invalid_urls' => [
            'https://mermaid.ink/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('MermaidInk', [ 'width' => 480, 'height' => 270]);
    }
}

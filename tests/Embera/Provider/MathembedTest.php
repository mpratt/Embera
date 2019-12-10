<?php
/**
 * MathembedTest.php
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
 * Test the Mathembed Provider
 */
final class MathembedTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://mathembed.com/latex?inputText=f(x)',
            'http://mathembed.com/latex?inputText=f(x)%20%3D%2010%20%2B%2010%20-%2010%3B',
        ],
        'invalid_urls' => [
            'http://mathembed.com/',
            'http://mathembed.com/latex?',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Mathembed', [ 'width' => 480, 'height' => 270]);
    }
}

<?php
/**
 * InoreaderTest.php
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
 * Test the Inoreader Provider
 */
final class InoreaderTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.inoreader.com/article/3a9c6e7f3159059e-john-wick-ch-2-the-righteous-violence-we-so-desperately-need-right-now',
        ],
        'invalid_urls' => [
            'https://www.inoreader.com/',
            'https://www.inoreader.com/article/',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Inoreader', [ 'width' => 480, 'height' => 270]);
    }
}

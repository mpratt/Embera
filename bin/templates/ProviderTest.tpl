<?php
/**
 * {provider}Test.php
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
 * Test the {provider} Provider
 */
final class {provider}Test extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            '',
            '',
            '',
        ],
        'invalid_urls' => [
            '',
            '',
            '',
        ],
        'normalize_urls' => [
            '' => '',
        ],
        'fake_response' => [
            'type' => '',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('{provider}', [ 'width' => 480, 'height' => 270]);
    }
}

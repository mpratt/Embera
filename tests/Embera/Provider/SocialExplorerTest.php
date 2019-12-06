<?php
/**
 * SocialExplorerTest.php
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
 * Test the SocialExplorer Provider
 */
final class SocialExplorerTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.socialexplorer.com/a9676d974c/embed',
        ],
        'invalid_urls' => [
            'https://www.socialexplorer.com/a9676d974c/',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('SocialExplorer', [ 'width' => 480, 'height' => 270]);
    }
}

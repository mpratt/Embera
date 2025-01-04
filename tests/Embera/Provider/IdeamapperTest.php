<?php
/**
 * IdeamapperTest.php
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
 * Test the Ideamapper Provider
 */
final class IdeamapperTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'http://oembed.ideamapper.com/post/f00ba2',
        ],
        'invalid_urls' => [
            'http://oembed.ideamapper.com',
        ],
    ];

    public function testProvider()
    {
        $this->markTestIncomplete('We need more urls to test against for the Ideamapper provider.');
    }
}

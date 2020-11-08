<?php
/**
 * ActBlueTest.php
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
 * Test the ActBlue Provider
 */
final class ActBlueTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://secure.actblue.com/donate/actblue-1-embed',
        ],
        'invalid_urls' => [
            'https://secure.actblue.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('ActBlue', [ 'width' => 480, 'height' => 270]);
    }
}

<?php
/**
 * ScenesTest.php
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
 * Test the Scenes Provider
 */
final class ScenesTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://getscenes.com/e/8a07afbb-0a7c-4314-b027-15a19e25c51a',
            'https://getscenes.com/event/8a07afbb-0a7c-4314-b027-15a19e25c51a',
        ],
        'invalid_urls' => [
            'https://getscenes.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Scenes', [ 'width' => 480, 'height' => 270]);
    }
}

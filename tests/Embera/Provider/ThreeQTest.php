<?php
/**
 * ThreeQTest.php
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
 * Test the 3Q Provider
 */
final class ThreeQTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://playout.3qsdn.com/embed/1111c681-0052-4952-b42b-f4b20aae99d5',
        ],
        'invalid_urls' => [
            'https://playout.3qsdn.com/',
        ],
    ];

    public function testProvider()
    {
        $this->markTestIncomplete('We require new urls to test against on the ThreeQ provider');
    }
}

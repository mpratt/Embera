<?php
/**
 * HuluTest.php
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
 * Test the Hulu Provider
 */
final class HuluTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.hulu.com/watch/20807/late-night-with-conan-obrien-wed-may-21-2008',
        ],
        'invalid_urls' => [
            'http://hulu.com/450265',
            'http://www.hulu.com/watch/abduej/2344657', // Not numeric path
        ],
        'normalize_urls' => [
            'http://www.hulu.com/watch/20807/late-night-with-conan-obrien-wed-may-21-2008' => 'https://www.hulu.com/watch/20807',
        ],
    ];

    public function testProvider()
    {
        $travis = (bool) getenv('TRAVIS');
        if ($travis) {
            $this->markTestIncomplete('Disabling this provider since it seems to have problems with the endpoint (Hulu).');
        }

        $this->validateProvider('Hulu', [ 'width' => 480, 'height' => 270]);
    }
}

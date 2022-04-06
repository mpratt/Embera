<?php
/**
 * IncredibleTest.php
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
 * Test the Incredible Provider
 */
final class IncredibleTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://incredible.dev/watch/md-to-video',
        ],
        'invalid_urls' => [
            'https://incredible.dev',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Incredible', [ 'width' => 480, 'height' => 270]);
    }
}

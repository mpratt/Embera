<?php
/**
 * GyazoTest.php
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
 * Test the Gyazo Provider
 */
final class GyazoTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://gyazo.com/d25e8b25de062ca49e2b58d74618782d',
            'http://gyazo.com/41a363bc94d18a49eb762b719075530d',
            'https://gyazo.com/3ec62dc44d433f79be1b57a7aae986ae?query=string'
        ],
        'invalid_urls' => [
            'https://gyazo.com/',
            'https://gyazo.com/3ec62dc44d433f79be1b57a7aae986ae/other-path',
        ],
        'normalize_urls' => [
            'http://gyazo.com/3ec62dc44d433f79be1b57a7aae986ae?query=string' => 'https://gyazo.com/3ec62dc44d433f79be1b57a7aae986ae',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Gyazo', [ 'width' => 480, 'height' => 270]);
    }
}

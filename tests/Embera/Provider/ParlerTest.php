<?php
/**
 * ParlerTest.php
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
 * Test the Parler Provider
 */
final class ParlerTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://app.parler.com/post/01kvqsje5b1fhwcv7s02hfx16k',
            'https://app.parler.com/b/01kvv92fk5xzn20azxg0z297cf',
        ],
        'invalid_urls' => [
            'https://app.parler.com',
            'https://app.parler.com/post',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Parler', [ 'width' => 480, 'height' => 270]);
    }
}

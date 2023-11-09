<?php
/**
 * foodayTest.php
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
 * Test the fooday Provider
 */
final class FoodayTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://fooday.app/en/reviews/229sej9vN5xv9uHYpYJLyF',
        ],
        'invalid_urls' => [
            'https://fooday.app',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Fooday', [ 'width' => 480, 'height' => 270]);
    }
}

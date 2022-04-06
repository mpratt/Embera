<?php
/**
 * BookingmoodTest.php
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
 * Test the Bookingmood Provider
 */
final class BookingmoodTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.bookingmood.com/embed/search/cb8ea5f0-c766-4dd4-913e-fa2ec0db4dee',
        ],
        'invalid_urls' => [
            'https://www.bookingmood.com/',
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Bookingmood', [ 'width' => 480, 'height' => 270]);
    }
}

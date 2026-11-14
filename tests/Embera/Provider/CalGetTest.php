<?php
/**
 * CalGetTest.php
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
 * Test the CalGet Provider
 */
final class CalGetTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://calget.com/calendar-embed/aygwtfdd',
        ],
        'invalid_urls' => [
            'https://calget.com',
            'https://calget.com/calendar-embed',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('CalGet', [ 'width' => 480, 'height' => 270]);
    }
}

<?php
/**
 * EvervizTest.php
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
 * Test the Everviz Provider
 */
final class EvervizTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://app.everviz.com/embed/R8jhGkYT5',
        ],
        'invalid_urls' => [
            'https://app.everviz.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Everviz', [ 'width' => 480, 'height' => 270]);
    }
}

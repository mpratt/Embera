<?php
/**
 * AltiumTest.php
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
 * Test the Altium Provider
 */
final class AltiumTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://altium.com/viewer/vN8in6nli06imztWoTol4w=='
        ],
        'invalid_urls' => [
            'https://altium.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Altium', [ 'width' => 480, 'height' => 270]);
    }
}

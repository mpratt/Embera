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
            'https://altium.com/viewer/vn8in6nli06imztwotol4w=='
        ],
        'invalid_urls' => [
            'https://altium.com/',
        ],
    ];

    public function testProvider()
    {
        $this->markTestSkipped('Altium no longer supports Anonymous urls');
        /* $this->validateProvider('Altium', [ 'width' => 480, 'height' => 270]); */
    }
}

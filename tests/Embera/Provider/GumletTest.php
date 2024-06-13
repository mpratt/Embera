<?php
/**
 * GumletTest.php
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
 * Test the Gumlet Provider
 */
final class GumletTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.gumlet.tv/watch/6221db301c8b821b0519fba0'
        ],
        'invalid_urls' => [
            'https://www.gumlet.com/',
        ],
    ];

    public function testProvider()
    {
        $this->markTestSkipped('Gumlet has problems when the url is encoded... Skipping tests for now until they fix it');
        // $this->validateProvider('Gumlet', [ 'width' => 480, 'height' => 270]);
    }
}

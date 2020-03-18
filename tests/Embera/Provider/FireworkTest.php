<?php
/**
 * FireworkTest.php
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
 * Test the Firework Provider
 */
final class FireworkTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://fireworktv.com/embed/jgK08v/videos/5x362b'
        ],
        'invalid_urls' => [
            'https://fireworktv.com',
            'https://fireworktv.com/embed/',
        ],
    ];

    public function testProvider()
    {
        $travis = (bool) getenv('ONTRAVIS');
        if ($travis) {
            $this->markTestIncomplete('Disabling testing because provider seems to have stop providing oembed capabilities (Firework). If it continues to fail it will be deleted.');
        }

        $this->validateProvider('Firework', [ 'width' => 480, 'height' => 270]);
    }
}

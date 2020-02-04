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
            'https://fireworktv.com/embed/RoPdno/v/gX8PaV',
            'https://fireworktv.com/embed/RoPdno/v/gX8G86',
            'https://fireworktv.com/embed/RoPdno/v/oWYOPx',
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
            $this->markTestIncomplete('Disabling this provider since it seems to have problems with the endpoint (Firework).');
        }

        $this->validateProvider('Firework', [ 'width' => 480, 'height' => 270]);
    }
}

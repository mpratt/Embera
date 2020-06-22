<?php
/**
 * WordwallTest.php
 *
 * @package Embera
 * @author Matías Minevitz <matias.minevitz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Provider;

use Embera\ProviderTester;

/**
 * Test the Wordwall Provider
 */
final class WordwallTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://wordwall.net/es/resource/1264265/repasamos-la-tabla-del-2',
            'https://wordwall.net/resource/1264265/repasamos-la-tabla-del-2',
            'https://wordwall.net/resource/1264265',
            'https://wordwall.net/play/421/579/947',
        ],
        'invalid_urls' => [
            'https://wordwall.net/es/play/421/579/947',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Wordwall', ['width' => 480, 'height' => 270]);
    }
}

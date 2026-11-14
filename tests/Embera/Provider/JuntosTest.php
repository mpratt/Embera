<?php
/**
 * JuntosTest.php
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
 * Test the Juntos Provider
 */
final class JuntosTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://play.juntos.live/solo/2aAD8q0VdfZhJAoxKZYT',
        ],
        'invalid_urls' => [
            'https://play.juntos.live',
            'https://play.juntos.live/solo',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Juntos', [ 'width' => 480, 'height' => 270]);
    }
}

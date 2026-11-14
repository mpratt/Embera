<?php
/**
 * VideobotTest.php
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
 * Test the Videobot Provider
 */
final class VideobotTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://videobot.com/embed/TNg59a5i',
        ],
        'invalid_urls' => [
            'https://videobot.com',
            'https://videobot.com/embed',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Videobot', [ 'width' => 480, 'height' => 270]);
    }
}

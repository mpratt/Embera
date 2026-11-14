<?php
/**
 * WewtalkTest.php
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
 * Test the Wewtalk Provider
 */
final class WewtalkTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.wewtalk.com/voice/83f691ab-2953-4103-845b-9159ba006f78',
        ],
        'invalid_urls' => [
            'https://www.wewtalk.com',
            'https://www.wewtalk.com/voice',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Wewtalk', [ 'width' => 480, 'height' => 270]);
    }
}

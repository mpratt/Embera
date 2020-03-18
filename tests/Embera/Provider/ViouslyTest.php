<?php
/**
 * ViouslyTest.php
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
 * Test the Viously Provider
 */
final class ViouslyTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.viously.com/positivr/gw2jTFu7Lsr',
            'https://www.viously.com/video-fr/p-LdALOtB4U',
        ],
        'invalid_urls' => [
            'https://www.viously.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Viously', [ 'width' => 480, 'height' => 270]);
    }
}

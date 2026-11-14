<?php
/**
 * MemeStackTest.php
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
 * Test the MemeStack Provider
 */
final class MemeStackTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://memestack.ai/gallery/61e6113b-c0e6-436a-ad7e-26a6885ccda9',
        ],
        'invalid_urls' => [
            'https://memestack.ai',
            'https://memestack.ai/gallery',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('MemeStack', [ 'width' => 480, 'height' => 270]);
    }
}

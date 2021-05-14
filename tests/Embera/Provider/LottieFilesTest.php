<?php
/**
 * LottieFilesTest.php
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
 * Test the LottieFiles Provider
 */
final class LottieFilesTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://lottiefiles.com/860-maldives-flag',
        ],
        'invalid_urls' => [
            'https://lottiefiles.com/featured',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('LottieFiles', [ 'width' => 480, 'height' => 270]);
    }
}

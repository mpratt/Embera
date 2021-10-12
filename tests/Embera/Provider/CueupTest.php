<?php
/**
 * CueupTest.php
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
 * Test the Cueup Provider
 */
final class CueupTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://cueup.io/user/weddingdjsax/sounds/soundcloud-1071797938_hey-judes-(jimmy-sax-black)',
        ],
        'invalid_urls' => [
            'https://cueup.io/',
            'https://cueup.io/user/spinso/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Cueup', [ 'width' => 480, 'height' => 270]);
    }
}

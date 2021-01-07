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
            'https://cueup.io/user/spinso/sounds/111_housie-bousie',
            'https://cueup.io/user/spinso/sounds/soundcloud-215863477_house-mixtape',
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

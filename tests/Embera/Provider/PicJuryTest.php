<?php
/**
 * PicJuryTest.php
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
 * Test the PicJury Provider
 */
final class PicJuryTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://picjury.app/p/PRBVCus0zx',
        ],
        'invalid_urls' => [
            'https://picjury.app',
            'https://picjury.app/p',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('PicJury', [ 'width' => 480, 'height' => 270]);
    }
}

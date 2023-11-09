<?php
/**
 * BehanceTest.php
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
 * Test the Behance Provider
 */
final class BehanceTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.behance.net/gallery/183422265/ydhy',
        ],
        'invalid_urls' => [
            'https://www.behance.net/gallery/183422265',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Behance', [ 'width' => 480, 'height' => 270]);
    }
}

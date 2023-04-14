<?php
/**
 * CanvaTest.php
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
 * Test the Canva Provider
 */
final class CanvaTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.canva.com/design/DACHZTlgWkU/view',
        ],
        'invalid_urls' => [
            'https://www.canva.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Canva', [ 'width' => 480, 'height' => 270]);
    }
}

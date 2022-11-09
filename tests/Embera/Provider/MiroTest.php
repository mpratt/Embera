<?php
/**
 * MiroTest.php
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
 * Test the Miro Provider
 */
final class MiroTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://miro.com/app/board/uXjVPZH3NrA=',
        ],
        'invalid_urls' => [
            'https://miro.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Miro', [ 'width' => 480, 'height' => 270]);
    }
}

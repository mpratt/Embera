<?php
/**
 * RenderTest.php
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
 * Test the Render Provider
 */
final class RenderTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://mudedlamanichand.onrender.com/index.html',
        ],
        'invalid_urls' => [
            'https://onrender.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Render', [ 'width' => 480, 'height' => 270]);
    }
}

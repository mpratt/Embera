<?php
/**
 * DadanTest.php
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
 * Test the Dadan Provider
 */
final class DadanTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://app.dadan.io/video/share/N8Hcbu0F1Du3ugmI',
        ],
        'invalid_urls' => [
            'https://app.dadan.io',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Dadan', [ 'width' => 480, 'height' => 270]);
    }
}

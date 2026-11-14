<?php
/**
 * VectreeTest.php
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
 * Test the Vectree Provider
 */
final class VectreeTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://vectree.io/c/photosynthesis',
            'https://vectree.io/c/bauhaus',
            'https://vectree.io/c/black-hole',
        ],
        'invalid_urls' => [
            'https://vectree.io',
            'https://vectree.io/c',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Vectree', [ 'width' => 480, 'height' => 270]);
    }
}

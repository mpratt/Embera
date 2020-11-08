<?php
/**
 * JovianTest.php
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
 * Test the Jovian Provider
 */
final class JovianTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://jovian.ml/aakashns/01-pytorch-basics',
            'https://jovian.ai/aakashns/01-pytorch-basics',
        ],
        'invalid_urls' => [
            'https://jovian.ml/',
            'https://jovian.ml/sonaksh/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Jovian', [ 'width' => 480, 'height' => 270]);
    }
}

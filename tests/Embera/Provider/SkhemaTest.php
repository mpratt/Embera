<?php
/**
 * SkhemaTest.php
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
 * Test the Skhema Provider
 */
final class SkhemaTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://skhema.com/embed/e/529c569c-1a5e-4189-b93d-ff5f7753a9a5',
        ],
        'invalid_urls' => [
            'https://skhema.com',
            'https://skhema.com/embed/e',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Skhema', [ 'width' => 480, 'height' => 270]);
    }
}

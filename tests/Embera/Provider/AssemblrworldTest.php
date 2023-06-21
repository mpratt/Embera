<?php
/**
 * AssemblrworldTest.php
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
 * Test the Assemblrworld Provider
 */
final class AssemblrworldTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://assemblr.world/Embed/-9ZYparJxjTEbQZwxYXU?info=false&hideCloseBtn=true',
        ],
        'invalid_urls' => [
            'https://localhost:3003/Embed/-9ZYparJxjTEbQZwxYXU?info=false&hideCloseBtn=true',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Assemblrworld', [ 'width' => 480, 'height' => 270]);
    }
}

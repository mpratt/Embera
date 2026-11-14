<?php
/**
 * CluesoTest.php
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
 * Test the Clueso Provider
 */
final class CluesoTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://clueso.site/embed/n87s4o44cfdz09bs',
        ],
        'invalid_urls' => [
            'https://clueso.site',
            'https://clueso.io',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Clueso', [ 'width' => 480, 'height' => 270]);
    }
}

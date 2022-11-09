<?php
/**
 * DocswellTest.php
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
 * Test the Docswell Provider
 */
final class DocswellTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.docswell.com/s/ku-suke/LK7J5V-hello-docswell',
        ],
        'invalid_urls' => [
            'https://www.docswell.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Docswell', [ 'width' => 480, 'height' => 270]);
    }
}

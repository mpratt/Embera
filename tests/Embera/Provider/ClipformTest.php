<?php
/**
 * ClipformTest.php
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
 * Test the Clipform Provider
 */
final class ClipformTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://clipform.io/c4479d620',
        ],
        'invalid_urls' => [
            'https://clipform.io',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Clipform', [ 'width' => 480, 'height' => 270]);
    }
}

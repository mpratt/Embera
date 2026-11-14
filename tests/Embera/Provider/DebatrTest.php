<?php
/**
 * DebatrTest.php
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
 * Test the Debatr Provider
 */
final class DebatrTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://debatr.tv/d/vv7hfvgy86/should-tech-companies-be-allowed-to-use-public-user-content',
            'https://debatr.tv/embed/vv7hfvgy86',
        ],
        'invalid_urls' => [
            'https://debatr.tv',
            'https://debatr.tv/d',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Debatr', [ 'width' => 480, 'height' => 270]);
    }
}

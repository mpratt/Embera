<?php
/**
 * LumiereTest.php
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
 * Test the Lumiere Provider
 */
final class LumiereTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://dev.p.lumiere.is/v/9qcQHJEf-o',
        ],
        'invalid_urls' => [
            'https://dev.p.lumiere.is',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Lumiere', [ 'width' => 480, 'height' => 270]);
    }
}

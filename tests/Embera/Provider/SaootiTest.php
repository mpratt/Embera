<?php
/**
 * SaootiTest.php
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
 * Test the Saooti Provider
 */
final class SaootiTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://octopus.saooti.com/main/pub/podcast/2525',
        ],
        'invalid_urls' => [
            'https://octopus.saooti.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Saooti', [ 'width' => 480, 'height' => 270]);
    }
}

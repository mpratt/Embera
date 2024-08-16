<?php
/**
 * ItabtechInfosysTest.php
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
 * Test the ItabtechInfosys Provider
 */
final class ItabtechInfosysTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://samay.itabtechinfosys.com/thank-you-image.png',
        ],
        'invalid_urls' => [
            'https://samay.itabtechinfosys.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('ItabtechInfosys', [ 'width' => 480, 'height' => 270]);
    }
}

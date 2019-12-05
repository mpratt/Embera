<?php
/**
 * PolariShareTest.php
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
 * Test the PolariShare Provider
 */
final class PolariShareTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'http://www.polarishare.com/@Chris%20Lee/sales-and-marketing-alignment-the-good-the-bad-and-the-ugly-0xtogp/1-SALES-MA/',
            'https://www.polarishare.com/@Chris%20Lee/dive-into-deep-learning-kor-p808gk/1-Dive-into',
            'https://polarishare.com/@jay2/functional-programming-in-javascript-chapter-4-s54sg1/1-Functional',
        ],
        'invalid_urls' => [
            'https://www.polarishare.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('PolariShare', [ 'width' => 480, 'height' => 270]);
    }
}

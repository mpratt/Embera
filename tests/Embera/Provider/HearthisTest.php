<?php
/**
 * HearthisTest.php
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
 * Test the Hearthis Provider
 */
final class HearthisTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'http://hearthis.at/verossi/verofamily013',
            'https://hearthis.at/cinoakadjcino/classic-house-trance-techno-cino-back-to-the-old-school-part-v/',
            'https://hearthis.at/jfrocks-jeff-fiorentino/banning-reality-2019-remaster/',
        ],
        'invalid_urls' => [
            'http://hearthis.at',
            'http://hearthis.at/verossi/verofamily013/other-path',
        ],
        'normalize_urls' => [
            'http://hearthis.at/verossi/verofamily013?query=string' => 'https://hearthis.at/verossi/verofamily013',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Hearthis', [ 'width' => 480, 'height' => 270]);
    }
}

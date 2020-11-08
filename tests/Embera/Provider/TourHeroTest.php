<?php
/**
 * TourHeroTest.php
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
 * Test the TourHero Provider
 */
final class TourHeroTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.tourhero.com/en/ultimate-guide-covid19-travel-restrictions-reopening/ukraine.html',
        ],
        'invalid_urls' => [
            'https://www.tourhero.com/'
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('TourHero', [ 'width' => 480, 'height' => 270]);
    }
}

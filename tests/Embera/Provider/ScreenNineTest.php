<?php
/**
 * ScreenNineTest.php
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
 * Test the ScreenNine Provider
 */
final class ScreenNineTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://videosite.screen9.tv/media/u6txqFxdedOXiyg2lOUmTQ/crane',
            'https://videosite.screen9.tv/media/wQZUpHKK0CQYu15ElQ1ASw/ship-in-malaren',
            'https://kva.screen9.tv/media/8xuwck9-dtl1-e0OwTKl3A/climate-extremes-in-a-warming-climate-1-5degc-2degc-and-higher',
            'https://clean.screen9.tv/media/Mle75WwNi-VjeOLSF1rXOQ/leaves-in-gentle-wind',
        ],
        'invalid_urls' => [
            'https://clean.screen9.tv/',
            'https://screen9.tv/media/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('ScreenNine', [ 'width' => 480, 'height' => 270]);
    }
}

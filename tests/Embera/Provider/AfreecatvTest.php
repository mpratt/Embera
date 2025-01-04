<?php
/**
 * AfreecatvTest.php
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
 * Test the Afreecatv Provider
 */
final class AfreecatvTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://vod.afreecatv.com/player/71021072',
            'https://vod.sooplive.co.kr/player/71021072'
        ],
        'invalid_urls' => [
            'https://vod.afreecatv.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Afreecatv', [ 'width' => 480, 'height' => 270]);
    }
}

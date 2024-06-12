<?php
/**
 * InsightTimerTest.php
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
 * Test the InsightTimer Provider
 */
final class InsightTimerTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://insighttimer.com/davidji/guided-meditations/deep-healing',
        ],
        'invalid_urls' => [
            'https://insighttimer.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('InsightTimer', [ 'width' => 480, 'height' => 270]);
    }
}

<?php
/**
 * TickcounterTest.php
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
 * Test the Tickcounter Provider
 */
final class TickcounterTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.tickcounter.com/countdown/413523/countdown-to-brexit',
            'https://www.tickcounter.com/countdown/900310/days-until-christmas-2019',
        ],
        'invalid_urls' => [
            'https://www.tickcounter.com/',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Tickcounter', [ 'width' => 480, 'height' => 270]);
    }
}

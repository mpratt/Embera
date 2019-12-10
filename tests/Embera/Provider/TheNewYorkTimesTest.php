<?php
/**
 * TheNewYorkTimesTest.php
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
 * Test the TheNewYorkTimes Provider
 */
final class TheNewYorkTimesTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.nytimes.com/2017/02/14/business/dealbook/bundling-online-services.html',
            'https://www.nytimes.com/2019/12/06/us/politics/trump-impeachment-hearings.html?action=click&module=Top%20Stories&pgtype=Homepage',
            'https://www.nytimes.com/2019/12/06/us/nas-pensacola-shooting.html?action=click&module=Top%20Stories&pgtype=Homepage',
        ],
        'invalid_urls' => [
            'https://www.nytimes.com/',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('TheNewYorkTimes', [ 'width' => 480, 'height' => 270]);
    }
}

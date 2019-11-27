<?php
/**
 * KidojuTest.php
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
 * Test the Kidoju Provider
 */
final class KidojuTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.kidoju.com/en/x/57c1c06430c6681900538352/57c1c06530c6681900538353',
            'http://kidoju.com/en/x/5717967226c8b91900aef464/5717967226c8b91900aef465#/1',
            'https://www.kidoju.com/en/x/571897e526c8b91900aef54d/571897e626c8b91900aef54e#/1',
        ],
        'invalid_urls' => [
            'https://www.kidoju.com/',
            'https://www.kidoju.com/en/',
            'https://www.kidoju.com/en/s/',
        ],
        'normalize_urls' => [
            'http://kidoju.com/en/x/5717967226c8b91900aef464/5717967226c8b91900aef465#/1' => 'https://www.kidoju.com/en/x/5717967226c8b91900aef464/5717967226c8b91900aef465',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Kidoju', [ 'width' => 480, 'height' => 270]);
    }
}

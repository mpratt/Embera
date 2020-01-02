<?php
/**
 * TwitterTest.php
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
 * Test the Twitter Provider
 */
final class TwitterTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://twitter.com/ELTIEMPO/status/1212856150288424960',
            'https://twitter.com/ELTIEMPO/status/1212852339721351168',
            'https://twitter.com/ELTIEMPO/status/1212848621844074497',
        ],
        'invalid_urls' => [
            'https://twitter.com/',
            'https://twitter.com/pewdiepie/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Twitter', [ 'width' => 480, 'height' => 270]);
    }
}

<?php
/**
 * TvcfTest.php
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
 * Test the Tvcf Provider
 */
final class TvcfTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://play.tvcf.co.kr/762808',
            'https://play.tvcf.co.kr/764884',
            'https://play.tvcf.co.kr/765274',
        ],
        'invalid_urls' => [
            'https://play.tvcf.co.kr/',
            'https://play.tvcf.co.kr/words',
        ],
        'fake_response' => [
            'type' => 'video',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Tvcf', [ 'width' => 480, 'height' => 270]);
    }
}

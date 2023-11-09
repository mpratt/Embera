<?php
/**
 * SmugmugTest.php
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
 * Test the Smugmug Provider
 */
final class SmugmugTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://paulbellinger.smugmug.com/Daily/Daily-2012/i-sM5JWTM',
            'https://fotomom.smugmug.com/Daily-Photos/My-Best-Daily-Shots/i-vXRPDn9',
        ],
        'invalid_urls' => [
            'https://smugmug.com/',
            'https://smugmug.com/Daily-Photos/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Smugmug', [ 'width' => 480, 'height' => 270]);
    }
}

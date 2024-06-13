<?php
/**
 * OrigitsTest.php
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
 * Test the Origits Provider
 */
final class OrigitsTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://origits.com/v/53310948',
        ],
        'invalid_urls' => [
            'https://origits.com/',
        ],
    ];

    public function testProvider()
    {
        $this->markTestSkipped('Origits requires to upload a video and then test it since the urls expire easily');
        // $this->validateProvider('Origits', [ 'width' => 480, 'height' => 270]);
    }
}

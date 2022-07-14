<?php
/**
 * PictureflyTest.php
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
 * Test the Picturelfly Provider
 */
final class PicturelfyTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://picturelfy.com/p/b4QFo0MWl2lu1sm',
        ],
        'invalid_urls' => [
            'https://picturelfy.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Picturelfy', [ 'width' => 480, 'height' => 270]);
    }
}

<?php
/**
 * YumpuTest.php
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
 * Test the Yumpu Provider
 */
final class YumpuTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.yumpu.com/xx/document/view/59632036/yumpu-jobs',
        ],
        'invalid_urls' => [
            'https://www.yumpu.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Yumpu', [ 'width' => 480, 'height' => 270]);
    }
}

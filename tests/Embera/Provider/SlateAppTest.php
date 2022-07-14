<?php
/**
 * SlateAppTest.php
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
 * Test the SlateApp Provider
 */
final class SlateAppTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://alex.slateapp.com/work/111',
        ],
        'invalid_urls' => [
            'https://alex.slateapp.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('SlateApp', [ 'width' => 480, 'height' => 270]);
    }
}

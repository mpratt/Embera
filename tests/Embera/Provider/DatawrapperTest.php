<?php
/**
 * DatawrapperTest.php
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
 * Test the Datawrapper Provider
 */
final class DatawrapperTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://datawrapper.dwcdn.net/RnWgL/9',
        ],
        'invalid_urls' => [
            'https://datawrapper.dwcdn.net/',
            'https://datawrapper.de/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Datawrapper', [ 'width' => 480, 'height' => 270]);
    }
}

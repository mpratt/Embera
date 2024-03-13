<?php
/**
 * ItemisCreateTest.php
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
 * Test the ItemisCreate Provider
 */
final class ItemisCreateTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://play.itemis.io/?model=58efe58d-9fd7-4192-8281-935d28eca7ff',
        ],
        'invalid_urls' => [
            'https://play.itemis.io/',
        ],
    ];

    public function testProvider()
    {
        $this->markTestSkipped('The ItemisCreate Provider has been disabled as it seems to be down.');
        $this->validateProvider('ItemisCreate', [ 'width' => 480, 'height' => 270]);
    }
}

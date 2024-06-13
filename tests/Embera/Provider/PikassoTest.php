<?php
/**
 * Pikasso.xyzTest.php
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
 * Test the Pikasso.xyz Provider
 */
final class PikassoTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://builder.pikasso.xyz/embed/button/5f5c5b5b-1b1a-4b1a-9b1a-5b5b5b5b5b5b',
        ],
        'invalid_urls' => [
            'https://builder.pikasso.xyz/',
        ],
    ];

    public function testProvider()
    {
        $this->markTestSkipped('Pikasso seems to be down. Deleting if this continues for a long time. (2024-06-13)');
        //$this->validateProvider('Pikasso', [ 'width' => 480, 'height' => 270]);
    }
}

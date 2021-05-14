<?php
/**
 * PreziTest.php
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
 * Test the Prezi Provider
 */
final class PreziTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://prezi.com/v/zrmitn0impxx/',
        ],
        'invalid_urls' => [
            'https://prezi.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Prezi', [ 'width' => 480, 'height' => 270]);
    }
}

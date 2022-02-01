<?php
/**
 * SmrthiTest.php
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
 * Test the Smrthi Provider
 */
final class SmrthiTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.smrthi.com/book/RigVeda/1.1.1',
        ],
        'invalid_urls' => [
            'https://www.smrthi.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Smrthi', [ 'width' => 480, 'height' => 270]);
    }
}

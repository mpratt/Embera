<?php
/**
 * VimeoTest.php
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
 * Test the Vimeo Provider
 */
final class VimeoTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://vimeo.com/375646424',
            'https://vimeo.com/374131624',
            'https://vimeo.com/374131624',
        ],
        'invalid_urls' => [
            'https://vimeo.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Vimeo', [ 'width' => 480, 'height' => 270]);
    }
}

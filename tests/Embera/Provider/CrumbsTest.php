<?php
/**
 * CrumbsTest.php
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
 * Test the Crumbs Provider
 */
final class CrumbsTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://crumb.sh/QdrfCWZeXKu',
        ],
        'invalid_urls' => [
            'https://crumb.sh',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Crumbs', [ 'width' => 480, 'height' => 270]);
    }
}

<?php
/**
 * WebcrumbsTest.php
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
 * Test the Webcrumbs Provider
 */
final class WebcrumbsTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'http://share.webcrumbs.org/Pd6r5O',
        ],
        'invalid_urls' => [
            'http://webcrumbs.org',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Webcrumbs', [ 'width' => 480, 'height' => 270]);
    }
}

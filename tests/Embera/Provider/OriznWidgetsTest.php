<?php
/**
 * OriznWidgetsTest.php
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
 * Test the OriznWidgets Provider
 */
final class OriznWidgetsTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://embed.orizn.app/widgets/visa',
            'https://embed.orizn.app/frame/budget?destination=VNM',
        ],
        'invalid_urls' => [
            'https://embed.orizn.app',
            'https://embed.orizn.app/widgets',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('OriznWidgets', [ 'width' => 480, 'height' => 270]);
    }
}

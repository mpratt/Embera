<?php
/**
 * MixpanelTest.php
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
 * Test the Mixpanel Provider
 */
final class MixpanelTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://mixpanel.com/project/2195193/view/139237/app/dashboards#id=685944&editor-card-id=%22report-link-4409611%22',
        ],
        'invalid_urls' => [
            'https://mixpanel.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Mixpanel', [ 'width' => 480, 'height' => 270]);
    }
}

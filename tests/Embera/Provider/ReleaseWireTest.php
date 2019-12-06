<?php
/**
 * ReleaseWireTest.php
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
 * Test the ReleaseWire Provider
 */
final class ReleaseWireTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'http://www.releasewire.com/press-releases/loving-home-care-services-celebrates-25-years-in-senior-home-and-health-care-services-1267201.htm',
            'http://rwire.com/1265998',
            'https://releasewire.com/press-releases/sustainable-9-wins-coveted-reggie-awards-from-housing-first-minnesota-1267203.htm',
            'https://www.releasewire.com/press-releases/healthymarks-revamps-website-to-help-san-diego-understand-original-medicare-medicare-advantage-plans-medicare-supplement-insurance-and-part-d-prescription-drug-plans-1265998.htm',
        ],
        'invalid_urls' => [
            'http://rwire.com/',
            'https://www.releasewire.com/press-releases/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('ReleaseWire', [ 'width' => 480, 'height' => 270]);
    }
}

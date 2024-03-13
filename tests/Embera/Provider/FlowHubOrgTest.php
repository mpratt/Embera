<?php
/**
 * FlowHubOrgTest.php
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
 * Test the FlowHubOrg Provider
 */
final class FlowHubOrgTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://flowhub.org/f/390ee0021ded4910',
            'https://flowhub.org/f/f21aed28a04a7fd0',
        ],
        'invalid_urls' => [
            'https://flowhub.org/',
            'https://flowhub.org/x/f21aed28a04a7fd0',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('FlowHubOrg', [ 'width' => 480, 'height' => 270]);
    }
}

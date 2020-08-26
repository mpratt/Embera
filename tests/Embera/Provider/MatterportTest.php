<?php
/**
 * MatterportTest.php
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
 * Test the Matterport Provider
 */
final class MatterportTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://my.matterport.com/show?m=uFiBguoZ7dP',
            'https://my.matterport.com/show/?m=UYd9izhXdMr',
        ],
        'invalid_urls' => [
            'https://matterport.com/show/',
            'https://matterport.com/show/?x=UYd9izhXdMr',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Matterport', [ 'width' => 480, 'height' => 270]);
    }
}

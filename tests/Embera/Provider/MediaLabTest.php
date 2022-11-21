<?php
/**
 * MediaLabTest.php
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
 * Test the MediaLab Provider
 */
final class MediaLabTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://sqmgym.medialab.app/share/watch/BXgEe/2e01cc5523b1ef516cfa0c8084477b4ee2e8e3d3945111025b6a2e5fed584f60/',
        ],
        'invalid_urls' => [
            'https://demo.medialab.co/'
        ],
    ];

    public function testProvider()
    {
        $travis = (bool) getenv('TRAVIS');
        if ($travis) {
            $this->markTestIncomplete('Disabling this provider since it seems to have problems with the endpoint (MediaLab).');
        }

        $this->validateProvider('MediaLab', [ 'width' => 480, 'height' => 270]);
    }
}

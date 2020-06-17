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
            'https://demo.medialab.co/share/watch/veE0Y/7274437b1142fb4a64c80fac2ad895195339665397b26e17a769e2faad27c13c/',
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

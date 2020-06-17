<?php
/**
 * OmniscopeTest.php
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
 * Test the Omniscope Provider
 */
final class OmniscopeTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://omniscope.me/Demos/Brexit/Brexit%20Tweets.iox/r/Report/#Cloud',
            'https://omniscope.me/Demos/Databases/DB+Live+Query.iox/',
        ],
        'invalid_urls' => [
            'https://omniscope.me',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $travis = (bool) getenv('TRAVIS');
        if ($travis) {
            $this->markTestIncomplete('Disabling this provider since it seems to have problems with the endpoint (Omniscope).');
        }

        $this->validateProvider('Omniscope', [ 'width' => 480, 'height' => 270]);
    }
}

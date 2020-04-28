<?php
/**
 * VliveTest.php
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
 * Test the Vlive Provider
 */
final class VliveTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.vlive.tv/video/164548',
            'https://www.vlive.tv/video/164360/',
            'https://www.vlive.tv/video/164689?query=string',
        ],
        'invalid_urls' => [
            'https://www.vlive.tv/',
        ],
        'fake_response' => [
            'type' => 'video',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $travis = (bool) getenv('TRAVIS');
        if ($travis) {
            $this->markTestIncomplete('Travis doesnt like this provider (Vlive).');
            return ;
        }

        $this->validateProvider('Vlive', [ 'width' => 480, 'height' => 270]);
    }
}

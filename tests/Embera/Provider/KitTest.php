<?php
/**
 * KitTest.php
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
 * Test the Kit Provider
 */
final class KitTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://kit.co/MKBHD/my-setup',
        ],
        'invalid_urls' => [
            'https://kit.co/',
            'https://kit.co/CaseyNeistat/',
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
            $this->markTestIncomplete('Disabling this provider since it seems to have problems with the endpoint (Kit).');
        }

        $this->validateProvider('Kit', [ 'width' => 480, 'height' => 270]);
    }
}

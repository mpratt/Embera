<?php
/**
 * Knacki.infoTest.php
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
 * Test the Knacki.info Provider
 */
final class KnackiTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://jdr.knacki.info/meuh/desole',
            'https://jdr.knacki.info/meuh/woop',
            'https://jdr.knacki.info/meuh/doigt?query=string',
        ],
        'invalid_urls' => [
            'https://jdr.knacki.info/',
            'https://jdr.knacki.info/meuh/',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Knacki', [ 'width' => 480, 'height' => 270]);
    }
}

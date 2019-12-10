<?php
/**
 * InfoveaveTest.php
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
 * Test the Infoveave Provider
 */
final class InfoveaveTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://demo.infoveave.net/E/ZGVtb3wxfENIfDU2OTR8MjAxfHRydWV8dHJ1ZQ==|AP25RKrQl0t',
        ],
        'invalid_urls' => [
            'https://infoveave.net',
        ],
        'normalize_urls' => [
            'http://demo.infoveave.net/E/ZGVtb3wxfENIfDU2OTR8MjAxfHRydWV8dHJ1ZQ==|AP25RKrQl0t?query=string' => 'https://demo.infoveave.net/E/ZGVtb3wxfENIfDU2OTR8MjAxfHRydWV8dHJ1ZQ==|AP25RKrQl0t',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Infoveave', [ 'width' => 480, 'height' => 270]);
    }
}

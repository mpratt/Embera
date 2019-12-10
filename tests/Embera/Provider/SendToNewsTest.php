<?php
/**
 * SendToNewsTest.php
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
 * Test the SendToNews Provider
 */
final class SendToNewsTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://embed.sendtonews.com/oembed/?SC=IuQTVUQ5ro-133019-5892',
        ],
        'invalid_urls' => [
            'https://embed.sendtonews.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('SendToNews', [ 'width' => 480, 'height' => 270]);
    }
}

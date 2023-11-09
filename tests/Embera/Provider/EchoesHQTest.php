<?php
/**
 * EchoesHQTest.php
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
 * Test the EchoesHQ Provider
 */
final class EchoesHQTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://app.echoeshq.com/embed/delivery/score-card?tid=c9e1d942-eafd-4496-9849-f964701c8944&p=r4w',
        ],
        'invalid_urls' => [
            'https://app.echoeshq.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('EchoesHQ', [ 'width' => 480, 'height' => 270]);
    }
}

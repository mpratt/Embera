<?php
/**
 * CarbonVoiceTest.php
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
 * Test the CarbonVoice Provider
 */
final class CarbonVoiceTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://carbonvoice.app/s/9DZPZUKtFnaBhlkR',
        ],
        'invalid_urls' => [
            'https://carbonvoice.app',
            'https://carbonvoice.app/s',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('CarbonVoice', [ 'width' => 480, 'height' => 270]);
    }
}

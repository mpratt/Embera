<?php
/**
 * UstreamTVTest.php
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
 * Test the UstreamTV Provider
 */
final class UstreamTVTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'http://www.ustream.tv/channel/americatv2oficial',
        ],
        'invalid_urls' => [
            'https://video.ibm.com',
        ],
        'normalize_urls' => [
            'http://www.ustream.tv/channel/americatv2oficial' => 'https://video.ibm.com/channel/americatv2oficial',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('UstreamTV', [ 'width' => 480, 'height' => 270]);
    }
}

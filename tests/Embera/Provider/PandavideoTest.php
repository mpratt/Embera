<?php
/**
 * PandavideoTest.php
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
 * Test the Pandavideo Provider
 */
final class PandavideoTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://player-vz-ded14ebd-85a.tv.pandavideo.com.br/embed/?v=3b101f05-84aa-4de0-9b64-71f1855388af',
        ],
        'invalid_urls' => [
            'https://pandavideo.com.br/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Pandavideo', [ 'width' => 480, 'height' => 270]);
    }
}

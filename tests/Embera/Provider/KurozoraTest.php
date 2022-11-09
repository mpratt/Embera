<?php
/**
 * KurozoraTest.php
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
 * Test the Kurozora Provider
 */
final class KurozoraTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://kurozora.app/episodes/1',
            'https://kurozora.app/songs/16779',
        ],
        'invalid_urls' => [
            'https://kurozora.app',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Kurozora', [ 'width' => 480, 'height' => 270]);
    }
}

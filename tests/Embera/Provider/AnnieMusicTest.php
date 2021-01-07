<?php
/**
 * AnnieMusicTest.php
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
 * Test the AnnieMusic Provider
 */
final class AnnieMusicTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://anniemusic.app/t/XDSOYMAnVG',
            'https://anniemusic.app/t/XmQlYIssCR',
        ],
        'invalid_urls' => [
            'https://anniemusic.app/XDSOYMAnVG',
            'https://anniemusic.app/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('AnnieMusic', [ 'width' => 480, 'height' => 270]);
    }
}

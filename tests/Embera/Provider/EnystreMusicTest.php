<?php
/**
 * EnystreMusicTest.php
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
 * Test the EnystreMusic Provider
 */
final class EnystreMusicTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://music.enystre.com/lyrics/164586',
        ],
        'invalid_urls' => [
            'https://music.enystre.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('EnystreMusic', [ 'width' => 480, 'height' => 270]);
    }
}

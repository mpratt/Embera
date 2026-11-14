<?php
/**
 * FrequencingTest.php
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
 * Test the Frequencing Provider
 */
final class FrequencingTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://frequencing.com/track/friends-beyond-my-street-demo-636b93af',
        ],
        'invalid_urls' => [
            'https://frequencing.com',
            'https://frequencing.com/track',
            'https://frequencing.com/user/someone',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Frequencing', [ 'width' => 480, 'height' => 270]);
    }
}

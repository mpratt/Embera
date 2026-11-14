<?php
/**
 * GenToonTest.php
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
 * Test the GenToon Provider
 */
final class GenToonTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.gentoon.ai/community/posts/9fa0016a-1192-4a72-afa8-d0ffad90c315',
            'https://www.gentoon.ai/en/community/posts/9fa0016a-1192-4a72-afa8-d0ffad90c315',
        ],
        'invalid_urls' => [
            'https://www.gentoon.ai',
            'https://www.gentoon.ai/community/posts',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('GenToon', [ 'width' => 480, 'height' => 270]);
    }
}

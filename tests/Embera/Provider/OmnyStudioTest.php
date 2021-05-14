<?php
/**
 * OmnyStudioTest.php
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
 * Test the OmnyStudio Provider
 */
final class OmnyStudioTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://omny.fm/shows/adapting/derek-guille',
        ],
        'invalid_urls' => [
            'https://omny.fm/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('OmnyStudio', [ 'width' => 480, 'height' => 270]);
    }
}

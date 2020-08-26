<?php
/**
 * ChainflixTest.php
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
 * Test the Chainflix Provider
 */
final class ChainflixTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://beta.chainflix.net/video?contentId=17132'
        ],
        'invalid_urls' => [
            'https://chainflix.net/',
        ],
    ];

    public function testProvider()
    {
        $travis = (bool) getenv('TRAVIS');
        if ($travis) {
            $this->markTestIncomplete('Disabling this provider since it seems to have problems with the endpoint (Chainflix).');
        }

        $this->validateProvider('Chainflix', [ 'width' => 480, 'height' => 270]);
    }
}

<?php
/**
 * ZnipeTVTest.php
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
 * Test the ZnipeTV Provider
 */
final class ZnipeTVTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://beta.znipe.tv/esl-genting-2018/stage?v=-L8UwcDwy8BFKXR6lLdj',
        ],
        'invalid_urls' => [
            'https://beta.znipe.tv/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('ZnipeTV', [ 'width' => 480, 'height' => 270]);
    }
}

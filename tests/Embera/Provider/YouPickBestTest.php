<?php
/**
 * YouPickBestTest.php
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
 * Test the YouPickBest Provider
 */
final class YouPickBestTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://youpick.best/ranking/what-is-the-greatest-documentary-film',
        ],
        'invalid_urls' => [
            'https://youpick.best',
            'https://youpick.best/ranking',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('YouPickBest', [ 'width' => 480, 'height' => 270]);
    }
}

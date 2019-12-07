<?php
/**
 * TyplogTest.php
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
 * Test the Typlog Provider
 */
final class TyplogTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://fourgifts.typlog.io/episodes/11',
            'https://fourgifts.typlog.io/episodes/12',
        ],
        'invalid_urls' => [
            'https://typlog.io/',
            'https://typlog.io/episodes/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Typlog', [ 'width' => 480, 'height' => 270]);
    }
}

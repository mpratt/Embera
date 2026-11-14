<?php
/**
 * PuzzelTest.php
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
 * Test the Puzzel Provider
 */
final class PuzzelTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://puzzel.org/en/word-scramble/play?p=-OGdxqOFm4zFK7hctIHB',
        ],
        'invalid_urls' => [
            'https://puzzel.org',
            'https://puzzel.org/en/word-scramble/play',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Puzzel', [ 'width' => 480, 'height' => 270]);
    }
}

<?php
/**
 * PresentTest.php
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
 * Test the Present Provider
 */
final class PresentTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://present.do/decks/60d20b8dffff3c06649f7a18',
            'https://present.do/decks/60c560548ae5e6673633c424',
            'https://present.do/decks/60e2a2203a59f57771f15789',
        ],
        'invalid_urls' => [
            'https://present.do/decks/',
            'https://present.do/'
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Present', [ 'width' => 480, 'height' => 270]);
    }
}

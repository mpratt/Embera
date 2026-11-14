<?php
/**
 * TuveliaTest.php
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
 * Test the Tuvelia Provider
 */
final class TuveliaTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://tuvelia.com/embed/-qanoD1KgFmv',
        ],
        'invalid_urls' => [
            'https://tuvelia.com',
            'https://tuvelia.com/embed',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Tuvelia', [ 'width' => 480, 'height' => 270]);
    }
}

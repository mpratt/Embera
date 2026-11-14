<?php
/**
 * WhypTest.php
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
 * Test the Whyp Provider
 */
final class WhypTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://whyp.it/tracks/example-track-HPuZgly3yViP',
            'https://whyp.it/collections/example-collection-hNdBmugKbF85',
        ],
        'invalid_urls' => [
            'https://whyp.it',
            'https://whyp.it/tracks',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Whyp', [ 'width' => 480, 'height' => 270]);
    }
}

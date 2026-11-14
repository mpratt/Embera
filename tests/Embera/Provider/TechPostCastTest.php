<?php
/**
 * TechPostCastTest.php
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
 * Test the TechPostCast Provider
 */
final class TechPostCastTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://techpostcast.com/headline-topic-programs/cm7mginv70000js10hzli74q9',
        ],
        'invalid_urls' => [
            'https://techpostcast.com',
            'https://techpostcast.com/headline-topic-programs',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('TechPostCast', [ 'width' => 480, 'height' => 270]);
    }
}

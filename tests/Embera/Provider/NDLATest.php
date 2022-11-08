<?php
/**
 * NDLATest.php
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
 * Test the NDLA Provider
 */
final class NDLATest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://ndla.no/subject:20/topic:1:186732/topic:1:187167/resource:1:176616',
            'https://ndla.no/article/123',
        ],
        'invalid_urls' => [
            'https://ndla.no',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('NDLA', [ 'width' => 480, 'height' => 270]);
    }
}

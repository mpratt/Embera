<?php
/**
 * GeographUkTest.php
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
 * Test the GeographUk Provider
 */
final class GeographUkTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'http://www.geograph.org.uk/photo/3619867',
            'http://www.geograph.org.uk/photo/2308394/',
            'http://www.geograph.org.uk/photo/1449749',
            'http://www.geograph.co.uk/photo/292839',
            'http://www.geograph.ie/photo/353656',
            'http://www.geograph.org.uk/photo/1146430',
            'http://www.geograph.ie/photo/973235',
        ],
        'invalid_urls' => [
            'http://www.geograph.org.uk/',
            'http://www.geograph.org.uk/photo/',
            'http://www.geograph.ie/gallery.php',
        ],
        'normalize_urls' => [
            'http://www.geograph.org.uk/photo/1146430' => 'https://www.geograph.org.uk/photo/1146430',
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('GeographUk', [ 'width' => 480, 'height' => 270]);
    }
}

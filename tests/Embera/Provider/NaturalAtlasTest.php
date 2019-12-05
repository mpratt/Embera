<?php
/**
 * NaturalAtlasTest.php
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
 * Test the NaturalAtlas Provider
 */
final class NaturalAtlasTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://naturalatlas.com/@bryandebord/notes/15863',
            'https://naturalatlas.com/trailheads/cascade-lake-1936366',
            'https://naturalatlas.com/@brandon/notes/15856',
        ],
        'invalid_urls' => [
            'https://naturalatlas.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('NaturalAtlas', [ 'width' => 480, 'height' => 270]);
    }
}

<?php
/**
 * UniversityCambridgeMapTest.php
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
 * Test the UniversityCambridgeMap Provider
 */
final class UniversityCambridgeMapTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://map.cam.ac.uk/Department+of+Genetics',
            'https://map.cam.ac.uk/Department+of+Applied+Economics#52.201597,0.108826,18,52.207054,0.117073',
            'https://map.cam.ac.uk/Department+of+German+and+Dutch#52.200879,0.109642,18,52.207054,0.117073',
        ],
        'invalid_urls' => [
            'https://map.cam.ac.uk',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('UniversityCambridgeMap', [ 'width' => 480, 'height' => 270]);
    }
}

<?php
/**
 * BumperTest.php
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
 * Test the Bumper Provider
 */
final class BumperTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.bumper.com/marketplace-s/pr-286/indexhtml#/listing/222618920',
        ],
        'invalid_urls' => [
            'https://www.bumper.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Bumper', [ 'width' => 480, 'height' => 270]);
    }
}

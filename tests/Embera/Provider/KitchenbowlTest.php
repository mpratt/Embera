<?php
/**
 * KitchenbowlTest.php
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
 * Test the Kitchenbowl Provider
 */
final class KitchenbowlTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'http://www.kitchenbowl.com/recipe/NVsYg1R8ql/pork-and-shiitake-mushroom-dumplings',
            'http://www.kitchenbowl.com/recipe/GGnMVrU779/korean-bbq-short-ribs',
            'http://www.kitchenbowl.com/recipe/dXigfgQHJJ/autumn-spaghetti-with-brown-butter-and-sage-sauce',
        ],
        'invalid_urls' => [
            'http://www.kitchenbowl.com/recipe',
            'http://www.kitchenbowl.com/recipe/dXigfgQHJJ',
        ],
    ];

    public function testProvider()
    {
        $travis = (bool) getenv('TRAVIS');
        if ($travis) {
            $this->markTestIncomplete('Disabling this provider since it seems to have problems with the endpoint at the moment (Kitchenbowl).');
        }

        $this->validateProvider('Kitchenbowl', [ 'width' => 480, 'height' => 270]);
    }
}

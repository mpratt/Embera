<?php
/**
 * ModeloIOTest.php
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
 * Test the ModeloIO Provider
 */
final class ModeloIOTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://beta.modelo.io/embedded/PB4PgLTHJq?viewport=false&autoplay=false&modelName=JASPER ARCHITECTS - 161012_LISBOA_TODO_CON TERRENO_67_unix&authorName=Tian Deng&width=640&height=360',
        ],
        'invalid_urls' => [
            'https://beta.modelo.io/',
        ],
    ];

    public function testProvider()
    {
        $travis = (bool) getenv('TRAVIS');
        if ($travis) {
            $this->markTestIncomplete('Disabling this provider since it seems to have problems with the endpoint (ModeloIO).');
        }

        $this->validateProvider('ModeloIO', [ 'width' => 480, 'height' => 270]);
    }
}

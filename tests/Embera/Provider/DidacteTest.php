<?php
/**
 * DidacteTest.php
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
 * Test the Didacte Provider
 */
final class DidacteTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://easycpdlearning.didacte.com/a/course/5033/description',
            'https://ressources.didacte.com/a/course/1329/description',
            'https://finchp.didacte.com/a/course/363',
        ),
        'invalid_urls' => array(
            'https://www.didacte.com/a/course/363/description'
        ),
        'normalize_urls' => array(
            'http://ressources.didacte.com/a/course/1329/description/?rss=true' => 'https://ressources.didacte.com/a/course/1329/description',
        ),
    );

    public function testProvider()
    {
        $this->validateProvider('Didacte', [ 'width' => 480, 'height' => 270]);
    }
}

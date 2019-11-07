<?php
/**
 * BeautifulAITest.php
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
 * Test the BeautifulAI Provider
 */
final class BeautifulAITest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://www.beautiful.ai/deck/-L7QETWHKx_3vn8eIswg/Sample-Presentation'
        ),
        'invalid_urls' => array(
            'https://www.beautiful.ai/player/-L7QETWHKx_3vn8eIswg/Sample-Presentation'
        ),
        'normalize_urls' => array(
            'http://www.beautiful.ai/data/?string=true' => 'https://www.beautiful.ai/data/'
        ),
    );

    public function testProvider()
    {
        $this->validateProvider('BeautifulAI', [ 'width' => 480, 'height' => 270]);
    }
}

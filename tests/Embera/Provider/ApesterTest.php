<?php
/**
 * ApesterTest.php
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
 * Test the Apester Provider
 */
final class ApesterTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://renderer.apester.com/v2/5b87085e2cf9a20bdef88340',
            'https://renderer.apester.com/v2/5a1c97e8d749e4000108f534?preview=true&iframe_preview=true',
        ),
        'invalid_urls' => array(
            'https://renderer.apester.com/5b87085e2cf9a20bdef88340',
        ),
        'normalize_urls' => array(
            'http://renderer.apester.com/v2/5a1c97e8d749e4000108f534?preview=true&iframe_preview=true' => 'https://renderer.apester.com/v2/5a1c97e8d749e4000108f534',
        ),
        'fake_response' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('Apester', [ 'width' => 480, 'height' => 270]);
    }
}

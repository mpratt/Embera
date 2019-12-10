<?php
/**
 * AdwaysTest.php
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
 * Test the adways.com Provider
 */
final class AdwaysTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'http://play.adpaths.com/experience/2Hnd8S8',
        ),
        'invalid_urls' => array(
            'http://play.adpaths.com/path/experience/2Hnd8S8',
            'http://play.adpaths.com/experience/2Hnd8S8/other/stuff',
        ),
        'normalize_urls' => array(
            'http://play.adpaths.com/experience/2Hnd8S8/?oembed=1' => 'https://play.adpaths.com/experience/2Hnd8S8',
        ),
        'fake_response' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('Adways', [ 'width' => 480, 'height' => 270]);
    }
}

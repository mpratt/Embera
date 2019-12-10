<?php
/**
 * FaithLifeTVTest.php
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
 * Test the FaithLifeTV Provider
 */
final class FaithLifeTVTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://faithlifetv.com/media/300027',
            'https://faithlifetv.com/media/613267',
            'https://faithlifetv.com/items/345143',
        ),
        'invalid_urls' => array(
            'https://faithlifetv.com/',
            'https://faithlifetv.com/items/345143/other/path',
        ),
        'normalize_urls' => array(
            'https://www.faithlifetv.com/items/345143/?query=string' => 'https://www.faithlifetv.com/items/345143',
        ),
        'fake_response' => array(
            'type' => 'video',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('FaithLifeTV', [ 'width' => 480, 'height' => 270]);
    }
}

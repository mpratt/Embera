<?php
/**
 * FlickrTest.php
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
 * Test the Flickr Provider
 */
final class FlickrTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://www.flickr.com/photos/22134962@N03/8738306577/in/explore-2013-05-14',
            'https://flic.kr/p/9gAMbM',
            'https://www.flickr.com/photos/reddragonflydmc/5427387397/',
        ),
        'invalid_urls' => array(
            'http://flic.kr/',
            'http://www.flickr.com/',
        ),
        'normalize_urls' => array(
            'http://www.flickr.com/photos/22134962@N03/8738306577/in/explore-2013-05-14' => 'https://www.flickr.com/photos/22134962@N03/8738306577/',
            'http://flic.kr/p/9gAMbM' => 'https://flic.kr/p/9gAMbM',
        ),
    );

    public function testProvider()
    {
        $this->validateProvider('Flickr', [ 'width' => 480, 'height' => 270]);
    }
}

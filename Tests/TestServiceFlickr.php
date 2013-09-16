<?php
/**
 * TestServiceFlickr.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceFlickr extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.flickr.com/photos/22134962@N03/8738306577/in/explore-2013-05-14',
            'http://flic.kr/p/9gAMbM',
            'http://www.flickr.com/photos/reddragonflydmc/5427387397/',
            'http://www.flickr.com/photos/bees/8597283706/in/photostream',
            'http://www.flickr.com/photos/bees/8537962055/?noise=noise',
            'http://flic.kr/p/9gAMbM/',
            'http://www.flickr.com/photos/bees/8429256478'
        ),
        'invalid' => array(
            'http://www.flickr.com/22134962@N03/8738306577/',
            'http://www.flickr.com',
            'http://www.flickr.com/stuff/8429256478/',
            'http://www.flickr.com/noise/8429256478/',
            'http://www.flickr.com//8429256478/'
        ),
        'normalize' => array(
            'http://www.flickr.com/photos/22134962@N03/8738306577/in/explore-2013-05-14' => 'http://www.flickr.com/photos/22134962@N03/8738306577/',
            'http://flic.kr/p/9gAMbM' => 'http://flic.kr/p/9gAMbM',
            'http://www.flickr.com/photos/reddragonflydmc/5427387397/?noise=noise' => 'http://www.flickr.com/photos/reddragonflydmc/5427387397/',
            'http://www.flickr.com/photos/bees/8597283706/in/photostream' => 'http://www.flickr.com/photos/bees/8597283706/',
            'http://flic.kr/p/9gAMbM/' => 'http://flic.kr/p/9gAMbM/',
            'http://www.flickr.com/photos/bees/8429256478' => 'http://www.flickr.com/photos/bees/8429256478/',
            'http://www.flickr.com/photos/bees/8429256478/' => 'http://www.flickr.com/photos/bees/8429256478/',
        )
    );

    public function testProvider() { $this->validateProvider('Flickr'); }
}
?>

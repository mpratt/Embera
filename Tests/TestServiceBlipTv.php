<?php
/**
 * TestServiceBlipTv.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceBlipTv extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://a.blip.tv/laurainthekitchen/veggie-burger-recipe-6615471',
            'http://a.blip.tv/fnetwork/julien-fournie-paris-haute-couture-fall-winter-2013-fashion-network-6629497',
            'http://blip.tv/nostalgiacritic/nostalgia-critic-sailor-moon-6625851/',
            'http://blip.tv/phelous/deadly-friend-6617287',
            'http://blip.tv/v8tv/muscle-car-of-the-week-video-8-34-2-mile-1970-chevelle-ss-ls6-6623905',
            'http://blip.tv/askaninja/ask-a-ninja-question-34-the-bloodys-4441669',
            'http://blip.tv/nostalgia-chick/nostalgia-chick-lord-of-the-rings-return-of-the-king-part-1-6513810',
        ),
        'invalid' => array(
            'http://blip.tv/drama-videos',
            'http://blip.tv/askaninja/ask-a-ninja-question-34-the-bloodys', // Doesnt end with number id
            'http://blip.tv/muscle-car-of-the-week-video-8-34-2-mile-1970-chevelle-ss-ls6-6623905',
            'http://blip.tv/nostalgia-chick/nostalgia-chick-lord-of-the-rings-return-of-the-king-part-1-6513810/other-stuff',
            'http://blip.tv',
        ),
    );

    public function testProvider() { $this->validateProvider('BlipTv'); }
}
?>

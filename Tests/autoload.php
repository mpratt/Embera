<?php
/**
 * Setup the environment
 */
date_default_timezone_set('UTC');
if (file_exists(__DIR__ . '/../vendor/autoload.php'))
    require __DIR__ . '/../vendor/autoload.php';
else
    require __DIR__ . '/../Lib/Embera/Autoload.php';

/**
 * List
 * Class with all the lists
 */
class UrlList
{
    public static $url = array(
        'youtube' => array(
            'valid' => array(
                'http://www.youtube.com/watch?v=9bZkp7q19f0',
                'http://youtube.com/watch?v=J---aiyznGQ',
                'http://www.youtube.com/watch?v=xVrJ8DxECbg&list=PLwnD0jwK0yymXOCl82nqdTdxe0ykVDcPW&index=1',
                'http://youtube.com/watch?v=xVrJ8DxECbg&list=PLwnD0jwK0yymXOCl82nqdTdxe0ykVDcPW',
                'http://www.youtube.com/watch?v=9VrJ8D6ECbg&index=1',
                'http://youtube.com/watch?v=mghhLqu31cQ',
                'http://youtu.be/8aGEb_yUpMs'
            ),
            'invalid' => array(
                'http://youtube.com/watch?list=hi',
                'www.youtube.com/watch?v=J---aiyznGQ', // No Http at the beginning of the url
                'http://youtube.com /watch?video=J---aiyznGQ',
                'http://www.youtu.be.com/watch?lol=no',
                'http://www.youtube.com/hi#ho',
                'http://youtube.com/',
                'http://www.youtube.com/?id=ho'
            )
        ),
        'flickr' => array(
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
            )
        ),
        'vimeo' => array(
            'valid' => array(
                'http://vimeo.com/channels/staffpicks/66252440',
                'http://vimeo.com/channels/staffpicks/65535198/',
                'http://vimeo.com/groups/shortfilms/videos/66185763',
                'http://vimeo.com/groups/shortfilms/videos/63313811/',
                'http://vimeo.com/47360546',
                'http://vimeo.com/39892335/',
                'https://player.vimeo.com/video/65297606',
                'https://player.vimeo.com/video/25818086/'
            ),
            'invalid' => array(
                'http://vimeo.com/groups/shortfilms/videos/66185763/stuff/here',
                'http://vimeo.com/47360546/other/stuff/',
                'http://vimeo.com/groups/shortfilms/123',
                'http://vimeo.com/groups/shortfilms',
                'http://vimeo.com/',
                'http://vimeo.com/groups/stuff/?autoplay=1'
            )
        ),
        'dailymotion' => array(
            'valid' => array(
                'http://www.dailymotion.com/video/xxwxe1_harlem-shake-de-los-simpsons_fun',
                'http://dailymotion.com/video/xp30q9_bmw-serie3-2012-en-mexico_auto',
                'http://www.dailymotion.com/video/xzxtaf_red-bull-400-alic-y-stadlober-ganan-en-eslovenia_sport/',
                'http://www.dailymotion.com/video/xzva95_jacob-jones-and-the-bigfoot-mystery-launch-trailer_videogames',
                'http://www.dailymotion.com/video/xzx9vo_marc-gasol-lleva-a-memphis-a-su-primera-final-de-conferencia_sport',
                'http://www.dailymotion.com/video/xzx4m4_balotelli-au-prochain-cri-raciste-je-quitte-le-terrain_sport?from=rss',
                'http://www.dailymotion.com/video/xzse1m_casanova-tout-reste-possible-pour-l-om_sport/stuff/here/',
                'http://www.dailymotion.com/embed/video/xzxfpu',
                'http://www.dailymotion.com/embed/video/xzv0cd/'
            ),
            'invalid' => array(
                'http://www.dailymotion.com',
                'http://dailymotion.com',
                'http://www.dailymotion.com/channel/stuff/',
                'http://www.dailymotion.com/stuff/',
                'http://www.dailymotion.com/video/'
            )
        ),
        'viddler' => array(
            'valid' => array(
                'http://www.viddler.com/v/a695c468',
                'http://www.viddler.com/v/a695c468/lightbox?autoplay=1',
                'http://www.viddler.com/v/528b194c/otherStuff/lightbox',
                'http://viddler.com/embed/4c57d97a/lightbox',
                'http://viddler.com/v/4c57d97a/lightbox',
                'http://viddler.com/v/c83cacd4'
            ),
            'invalid' => array(
                'http://viddler.com/invalidstuff/a695c468',
                'http://www.viddler.com/v/zxsdg9',
                'http://www.viddler.com/player/528b194c/otherStuff/lightbox',
                'http://viddler.com/v/',
            )
        ),
        'qik' => array(
            'valid' => array(
                'http://www.qik.com/video/26383698',
                'http://qik.com/video/4226370',
                'http://qik.com/video/3698881',
                'http://qik.com/video/2130131'
            ),
            'invalid' => array(
                'http://qik.com/stuff/26383698',
                'http://qik.com/video/a452342b', // Not numeric
                'http://qik.com/video/3698881/other-stuff-here/',
                'http://qik.com/noidea/video/2130131'
            )
        ),
        'revision3' => array(
            'valid' => array(
                'http://revision3.com/sesslerssomething/e3-2013-preview',
                'http://revision3.com/tbhs/wire-we-here',
                'http://www.revision3.com/technobuffalo/ask-the-buffalo-380-nokia-lumia-running-android',
                'http://revision3.com/sidescrollers/bosnian-bear-wrestling/',
                'http://revision3.com/rev3gamespreviews/watchdogs-new-interview',
                'http://revision3.com/screwattackhardnewsclip/fat-cat'
            ),
            'invalid' => array(
                'http://revision3.com/host/anthony-carboni',
                'http://revision3.com/host/adam-sessler/',
                'http://revision3.com/host/tara-long',
                'http://revision3.com/network/games/',
                'http://revision3.com/network/sharkweek',
                'http://www.revision3.com/tbhs/',
                'http://revision3.com/anniesbits',
                'http://revision3.com/where',
                'http://revision3.com/advertise/contact/'
            )
        ),
    );

    /**
     * Method that returns an array with urls for the given $service
     *
     * @param string $service
     * @param bool   $invalid
     * @return array
     *
     * @throws Exception When the service seems invalid
     */
    public static function get($service, $invalid = false)
    {
        if (!isset(self::$url[strtolower($service)]))
            throw new Exception('Bad Service Name ' . $service);

        if ($invalid)
            return self::$url[strtolower($service)]['invalid'];

        return self::$url[strtolower($service)]['valid'];
    }

}

/**
 * HttpRequest Mockup
 * @codeCoverageIgnore
 */
class MockHttpRequest extends \Embera\HttpRequest
{
    public $response;
    public function fetch($url = '') { $url = true; return $this->response; }
}

/**
 * Oembed Mockup
 * @codeCoverageIgnore
 */
class MockOembed extends \Embera\Oembed
{
    public function getResourceInfo($apiUrl, $url, array $params = array()) { $apiUrl = $url = $params = true; return array(); }
}
?>

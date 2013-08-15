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
                'http://www.youtube.com/watch?v=WtPiGYsllos&index=1',
                'http://youtube.com/watch?v=mghhLqu31cQ',
                'http://youtu.be/8aGEb_yUpMs'
            ),
            'invalid' => array(
                'http://youtube.com/watch?list=hi',
                'http://youtube.com /watch?video=J---aiyznGQ',
                'http://www.youtu.be.com/watch?lol=no',
                'http://www.youtube.com/hi#ho',
                'http://youtube.com/',
                'http://www.youtube.com/?id=ho'
            ),
            'normalize' => array(
                'http://youtu.be/9bZkp7q19f0/werwer' => 'http://www.youtube.com/watch?v=9bZkp7q19f0',
                'http://www.youtube.com/watch?v=9bZkp7q19f0' => 'http://www.youtube.com/watch?v=9bZkp7q19f0',
                'http://youtube.com/watch?v=xVrJ8DxECbg&list=PLwnD0jwK0yymXOCl82nqdTdxe0ykVDcPW&index=1' => 'http://www.youtube.com/watch?v=xVrJ8DxECbg',
                'http://youtu.be/8aGEb_yUpMs' => 'http://www.youtube.com/watch?v=8aGEb_yUpMs',
                'http://youtube.com/watch?v=J---aiyznGQ&index=1' => 'http://www.youtube.com/watch?v=J---aiyznGQ',
                'http://youtube.com/watch?v=mghhLqu31cQ' => 'http://www.youtube.com/watch?v=mghhLqu31cQ',
            ),
            'fake' => array(
                'type' => 'video',
                'html' => '<iframe'
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
            ),
            'normalize' => array(
                'http://vimeo.com/channels/staffpicks/66252440' => 'http://vimeo.com/66252440',
                'http://vimeo.com/channels/staffpicks/65535198/' => 'http://vimeo.com/65535198',
                'https://player.vimeo.com/video/65297606' => 'http://vimeo.com/65297606',
                'http://vimeo.com/groups/shortfilms/videos/63313811/' => 'http://vimeo.com/63313811',
                'http://vimeo.com/47360546' => 'http://vimeo.com/47360546',
                'http://vimeo.com/39892335/' => 'http://vimeo.com/39892335',
            ),
            'fake' => array(
                'type' => 'video',
                'html' => '<iframe'
            )
        ),
        'dailymotion' => array(
            'valid' => array(
                'http://www.dailymotion.com/video/xxwxe1_harlem-shake-de-los-simpsons_fun',
                'http://dailymotion.com/video/xp30q9_bmw-serie3-2012-en-mexico_auto',
                'http://www.dailymotion.com/video/xzxtaf_red-bull-400-alic-y-stadlober-ganan-en-eslovenia_sport/',
                'http://www.dailymotion.com/video/xzva95_jacob-jones-and-the-bigfoot-mystery-launch-trailer_videogames',
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
            ),
            'normalize' =>  array(
                'http://www.dailymotion.com/video/xxwxe1_harlem-shake-de-los-simpsons_fun' => 'http://www.dailymotion.com/video/xxwxe1_harlem-shake-de-los-simpsons_fun',
                'http://dailymotion.com/video/xp30q9_bmw-serie3-2012-en-mexico_auto' => 'http://www.dailymotion.com/video/xp30q9_bmw-serie3-2012-en-mexico_auto',
                'http://www.dailymotion.com/video/xzxtaf_red-bull-400-alic-y-stadlober-ganan-en-eslovenia_sport/' => 'http://www.dailymotion.com/video/xzxtaf_red-bull-400-alic-y-stadlober-ganan-en-eslovenia_sport',
                'http://www.dailymotion.com/embed/video/xzxfpu' => 'http://www.dailymotion.com/video/xzxfpu',
                'http://www.dailymotion.com/video/xzx4m4_balotelli-au-prochain-cri-raciste-je-quitte-le-terrain_sport?from=rss' => 'http://www.dailymotion.com/video/xzx4m4_balotelli-au-prochain-cri-raciste-je-quitte-le-terrain_sport',
                'http://www.dailymotion.com/embed/video/xzv0cd/' => 'http://www.dailymotion.com/video/xzv0cd',
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
            ),
            'normalize' => array(
                'http://www.viddler.com/v/a695c468' => 'http://www.viddler.com/v/a695c468',
                'http://www.viddler.com/v/a695c468/' => 'http://www.viddler.com/v/a695c468',
                'http://www.viddler.com/v/528b194c/otherStuff/lightbox' => 'http://www.viddler.com/v/528b194c',
                'http://viddler.com/embed/4c57d97a/lightbox' => 'http://www.viddler.com/v/4c57d97a',
                'http://viddler.com/embed/4c57d97a/' => 'http://www.viddler.com/v/4c57d97a',
            ),
            'fake' => array(
                'type' => 'video',
                'html' => '<iframe'
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
            ),
            'normalize' => array(
                'http://revision3.com/sesslerssomething/e3-2013-preview' => 'http://revision3.com/sesslerssomething/e3-2013-preview',
                'http://www.revision3.com/technobuffalo/ask-the-buffalo-380-nokia-lumia-running-android' => 'http://www.revision3.com/technobuffalo/ask-the-buffalo-380-nokia-lumia-running-android',
            )
        ),
        'hulu' => array(
            'valid' => array(
                'http://www.hulu.com/watch/20807/late-night-with-conan-obrien-wed-may-21-2008',
                'http://hulu.com/watch/501126',
                'http://www.hulu.com/watch/440265/',
                'http://hulu.com/watch/476621',
                'http://www.hulu.com/watch/331822/stuff/here',
                'http://www.hulu.com/watch/416223?playlist_id=1787&asset_scope=movies',
                'http://hulu.com/watch/493032/'
            ),
            'invalid' => array(
                'http://www.hulu.com/stuff/440265',
                'http://www.hulu.com/watch/abduej/2344657', // Not numeric
                'http://hulu.com/450265',
                'http://www.hulu.com/watch/44ui65/'
            ),
            'normalize' => array(
                'http://www.hulu.com/watch/20807/late-night-with-conan-obrien-wed-may-21-2008' => 'http://www.hulu.com/watch/20807',
                'http://www.hulu.com/watch/440265/' => 'http://www.hulu.com/watch/440265',
                'http://www.hulu.com/watch/416223?playlist_id=1787&asset_scope=movies' => 'http://www.hulu.com/watch/416223',
                'http://hulu.com/watch/331822/stuff/here' => 'http://www.hulu.com/watch/331822',
                'http://hulu.com/watch/501126' => 'http://www.hulu.com/watch/501126',
            )
        ),
        'twitter' => array(
            'valid' => array(
                'https://twitter.com/ThatKevinSmith/status/361972660344856576',
                'https://twitter.com/RalphGarman/status/363749205367472129/',
                'https://twitter.com/RalphGarman/status/363354457351782401',
                'http://twitter.com/#!RalphGarman/status/363326025834299393',
                'https://twitter.com/#!RalphGarman/status/362589356495605762/',
                'https://twitter.com/#!RalphGarman/status/362279899639197696'
            ),
            'invalid' => array(
                'https://twitter.com/RalphGarman/statuses/363354457351782401',
                'https://twitter.com/#!RalphGarman/status/wordswordswords/',
                'https://twitter.com/status/363749205367472129/',
                'https://twitter.com/RalphGarman/363749205367472129/',
                'https://twitter.com/#!363749205367472129/',
                'https://twitter.com/363749205367472129/',
                'https://twitter.com/',
            )
        ),
        'jest' => array(
            'valid' => array(
                'http://www.jest.com/embed/207307/music-video-resourcefully-assimilates-stock-footage',
                'http://www.jest.com/video/201909/',
                'http://www.jest.com/embed/202219',
                'http://jest.com/video/201618/cnns-undecided-voters-as-played-by-babies',
                'http://www.jest.com/video/201272/presidential-debate-2-remix',
                'http://www.jest.com/embed/209484/awkward-birthday',
                'http://jest.com/embed/209499/breaking/stuff',
            ),
            'invalid' => array(
                'http://www.jest.com/embedVideo/6897394', // wrong path
                'http://www.jest.com/embed/6buaksui4', // Not numeric
                'http://www.jest.com/videos/6897394',
                'http://www.jest.com/6897394'
            )
        ),
        'collegehumor' => array(
            'valid' => array(
                'http://www.collegehumor.com/video/6830834/mitt-romney-style-gangnam-style-parody',
                'http://www.collegehumor.com/embed/6897735/dogs-come-1-by-1-for-treats-theres-a-cat-and-oh-also-a-duck/',
                'http://www.collegehumor.com/video/6897575/',
                'http://www.collegehumor.com/embed/6897394',
                'http://www.collegehumor.com/video/6182447/kid-farm',
                'http://collegehumor.com/video/6643191/batman-chooses-his-voice',
                'http://collegehumor.com/video/6621074',
                'http://www.collegehumor.com/video/6817857/the-dark-knight-meets-the-avengers',
            ),
            'invalid' => array(
                'http://www.collegehumor.com/embedVideo/6897394', // wrong path
                'http://www.collegehumor.com/embed/6buaksui4', // Not numeric
                'http://www.collegehumor.com/videos/6897394',
                'http://www.collegehumor.com/6897394'
            )
        ),
        'myopera' => array(
            'valid' => array(
                'http://my.opera.com/cstrep/avatar.pl',
                'http://my.opera.com/cstrep/albums/showpic.dml?album=504322&picture=6964560',
                'http://my.opera.com/chooseopera/albums/show.dml?id=12909671',
                'http://my.opera.com/chooseopera/albums/showpic.dml?album=12909671&picture=168425501',
                'http://my.opera.com/chooseopera/albums/show.dml?id=9363632',
                'http://my.opera.com/chooseopera/albums/showpic.dml?album=9363632&picture=128991402',
                'http://my.opera.com/Aleksander/avatar.pl',
            ),
            'invalid' => array(
                'http://my.opera.com/avatar.pl',
                'http://my.opera.com/chooseopera/albums/show.dml',
                'http://my.opera.com/chooseopera/albums/showpic.dml?picture=128991482&album=9363632', // Order matters
                'http://my.opera.com/chooseopera/albums/showpic.dml?noise=12909671',
                'http://my.opera.com/chooseopera/albums/showStuff.dml?id=9363632',
                'http://my.opera.com/chooseopera/invalid/showpic.dml?picture=128991482&album=9363632&noise=yes',
                'http://my.opera.com/Aleksander/avatar/',
            )
        ),
        'deviantart' => array(
            'valid' => array(
                'http://lieveheersbeestje.deviantart.com/art/Heart-of-gold-378848984',
                'http://wordofchen.deviantart.com/art/Pressure-379617958/',
                'http://sarahharas1.deviantart.com/art/Purple-haze-379565213/',
                'http://m-eralp.deviantart.com/art/After-rain-bomb-379561772',
                'http://fav.me/d69yyh3/',
                'http://fav.me/d69yh7m',
                'http://fav.me/d67maku/',
            ),
            'invalid' => array(
                'http://lieveheersbeestje.deviantart.com/art/house/Heart-of-gold-378848984',
                'http://wordofchen.deviantart.com/soup/Pressure-379617958',
                'http://sarahharas1.deviantart.com/class/379565213',
                'http://fav.me/d69yyh3/stuff/',
                'http://sta.sh/',
                'http://fav.me/',
            ),
            'private' => array(
                'http://sooper-deviant.deviantart.com/art/Brand-New-Day-1769-376513535'
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
    public static function get($service, $key = 'valid')
    {
        $service = strtolower($service);
        $key = strtolower($key);

        if (!isset(self::$url[$service]))
            throw new Exception('Bad Service Name ' . $service);

        if (isset(self::$url[$service][$key]))
            return self::$url[$service][$key];

        return false;
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
 * A custom Service
 */
class CustomService extends \Embera\Adapters\Service
{
    protected $apiUrl = 'http://my-custom-service.com/oembed.json';
    public function validateUrl(){ return preg_match('~customservice\.com/([0-9]+)~i', $this->url); }
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

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
                'http://www.dailymotion.com/video/xzva95_jacob-jones-and-the-bigfoot-mystery-launch-trailer_videogames',
                'http://www.dailymotion.com/video/xzx4m4_balotelli-au-prochain-cri-raciste-je-quitte-le-terrain_sport?from=rss',
                'http://www.dailymotion.com/video/xzse1m_casanova-tout-reste-possible-pour-l-om_sport/stuff/here/',
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
            ),
            'fake' => array(
                'type' => 'video',
                'html' => '<iframe'
            )
        ),
        'yfrog' => array(
            'valid' => array(
                'http://yfrog.us/jukynnj',
                'http://twitter.yfrog.com/es3r8kzj',
                'http://twitter.yfrog.com/hws60ilj?sa=0',
                'http://yfrog.com/odxklwraj',
                'http://yfrog.com/odxklwraj?sa=0',
                'http://www.yfrog.com/h835endj',
                'http://yfrog.us/mryll1j',
                'http://twitter.yfrog.com/kex9kulj?sa=0',
            ),
            'invalid' => array(
                'http://twitter.yfrog.com/user/IsabelVRuys/profile',
                'http://yfrog.com/about',
                'http://twitter.yfrog.com/',
                'http://yfrog.com/',
                'http://twitter.yfrog.com/page/faq',
                'http://blog.yfrog.com/jobs/',
                'http://twitter.yfrog.com/page/api',
            ),
            'normalize' => array(
                'http://twitter.yfrog.com/hws60ilj?sa=0' => 'http://twitter.yfrog.com/hws60ilj',
                'http://twitter.yfrog.com/hws60ilj?sa=1' => 'http://twitter.yfrog.com/hws60ilj',
                'http://twitter.yfrog.com/hws60ilj?sa=0&stuff=stuff' => 'http://twitter.yfrog.com/hws60ilj',
            )
        ),
        'polldaddy' => array(
            'valid' => array(
                'http://polldaddy.com/poll/7012505/',
                'http://polldaddy.com/s/ADF2AB9E60258D2A/',
                'http://polldaddy.com/ratings/39/',
                'http://polldaddy.com/poll/6976912/',
                'https://polldaddy.com/poll/7205026/',
                'http://www.polldaddy.com/poll/7012505',
                'http://mpcimageartist.polldaddy.com/s/emotions',
                'http://theguy1979.polldaddy.com/s/growing-up-biracial-in-america-being-of-mixed-race-descent-in-2013',
            ),
            'invalid' => array(
                'https://polldaddy.com/features/',
                'http://polldaddy.com',
                'https://polldaddy.com/pricing/',
                'https://polldaddy.com/poll/7205026/other-stuff',
            ),
            'normalize' => array(
                'https://www.polldaddy.com/poll/6976912/' => 'http://polldaddy.com/poll/6976912/',
                'http://www.polldaddy.com/poll/6976912/' => 'http://polldaddy.com/poll/6976912/',
                'http://polldaddy.com/poll/6976912/' => 'http://polldaddy.com/poll/6976912/',
                'https://polldaddy.com/poll/7205026/' => 'http://polldaddy.com/poll/7205026/',
            )
        ),
        'roomshare' => array(
            'valid' => array(
                'http://roomshare.jp/en/post/137453',
                'http://roomshare.jp/post/137453',
                'http://roomshare.jp/en/post/137393/',
                'http://www.roomshare.jp/post/137393',
            ),
            'invalid' => array(
                'http://roomshare.jp/en/post?region=1',
                'http://roomshare.jp/en/',
                'http://roomshare.jp/keywords',
                'http://roomshare.jp',
            ),
        ),
        'wordpresstv' => array(
            'valid' => array(
                'http://wordpress.tv/2013/08/25/andy-hayes-website-critiques-how-to-decide-what-works-and-what-to-ditch/',
                'http://wordpress.tv/2013/05/09/understanding-the-add-new-link-screen-and-xfn-link-relationships/',
                'http://wordpress.tv/2013/04/20/kimanzi-constable-the-power-of-your-story-through-wordpress/',
                'http://wordpress.tv/2013/04/12/jayvie-canono-designing-for-development',
                'http://blog.wordpress.tv/2013/08/08/state-of-the-word-retrospective/',
                'http://blog.wordpress.tv/2010/06/21/wordpress-3-0-videos/'
            ),
            'invalid' => array(
                'http://wordpress.tv/tag/plugins/',
                'http://wordpress.tv/get-involved/',
                'http://wordpress.tv/category/how-to/',
            ),
        ),
        'meetup' => array(
            'valid' => array(
                'http://www.meetup.com/PHPColMeetup/events/126690622/',
                'http://www.meetup.com/PHPColMeetup/photos/',
                'http://meetup.com/PHPColMeetup/events/calendar/?scroll=true',
                'http://www.meetup.com/PHPColMeetup/events/calendar/',
                'http://www.meetup.com/PHPColMeetup/',
            ),
            'invalid' => array(
                'http://www.meetup.com/',
                'http://meetu.ps/17GDWn/other/stuff',
            ),
            'normalize' => array(
                'http://www.meetup.com/PHPColMeetup/?scroll=true' => 'http://www.meetup.com/PHPColMeetup/',
                'http://www.meetup.com/PHPColMeetup/' => 'http://www.meetup.com/PHPColMeetup/',
            )
        ),
        'sketchfab' => array(
            'valid' => array(
                'https://sketchfab.com/show/lRyoY4ZsPRUMPlSiz03ORxTIXXK',
                'https://sketchfab.com/show/4e6urv5wnV8hxfhD2xUnSrvLNss',
                'https://sketchfab.com/show/7irY67vcquhR4DCmPAUsSyxZWoC/',
                'https://www.sketchfab.com/show/7w7pAfrCfjovwykkEeRFLGw5SXS',
                'https://sketchfab.com/show/s0eX1riDqEY6bT0uBtCjxC4V7OA',
                'https://sketchfab.com/show/lwVPifecIahu0rtGqlzZosBPFOC',
                'https://sketchfab.com/show/9lVs96AuFUAjKjwvsMG0Uf7Yy7b',
            ),
            'invalid' => array(
                'https://sketchfab.com/browse/',
                'https://sketchfab.com/browse/faved',
                'https://sketchfab.com/show/9lVs96AuFUAjKjwvsMG0Uf7Yy7b/other/crap',
                'https://sketchfab.com/order',
                'https://sketchfab.com/show/',
                'https://sketchfab.com/dashboard/upload',
                'https://sketchfab.com/'
            ),
            'normalize' => array(
                'https://www.sketchfab.com/show/9lVs96AuFUAjKjwvsMG0Uf7Yy7b' => 'https://sketchfab.com/show/9lVs96AuFUAjKjwvsMG0Uf7Yy7b',
                'https://sketchfab.com/show/9lVs96AuFUAjKjwvsMG0Uf7Yy7b' => 'https://sketchfab.com/show/9lVs96AuFUAjKjwvsMG0Uf7Yy7b',
                'https://www.sketchfab.com/show/9lVs96AuFUAjKjwvsMG0Uf7Yy7b/' => 'https://sketchfab.com/show/9lVs96AuFUAjKjwvsMG0Uf7Yy7b',
            )
        ),
        'dipity' => array(
            'valid' => array(
                'http://www.dipity.com/BIRN/Albania-Local-Elections-2011/',
                'http://www.dipity.com/StevePro/Skype-from-startup-to-8-5-billion-sale',
                'http://www.dipity.com/ibmzrl/Nanotechnology-at-IBM-Research/',
                'http://dipity.com/StevePro/2010-in-Review/',
                'http://www.dipity.com/timeline/Bryson/',
                'http://www.dipity.com/timeline/Nba-Finals/',
            ),
            'invalid' => array(
                'http://www.dipity.com/timeline/Nba-Finals/other/stuff',
                'http://www.dipity.com/',
                'http://www.dipity.com/premium',
                'http://www.dipity.com/timetube',
                'http://www.dipity.com/join',
            ),
        ),
        'dailymile' => array(
            'valid' => array(
                'http://www.dailymile.com/people/EddieJ3/entries/24776213',
                'http://www.dailymile.com/people/JessicaP30/entries/24791047',
                'http://www.dailymile.com/people/JimF3/entries/24684863',
                'http://www.dailymile.com/people/JimF3/entries/24623801/',
                'http://dailymile.com/people/JimF3/entries/24447986',
                'http://dailymile.com/people/IANH17/entries/24533363/',
                'http://www.dailymile.com/people/IANH17/entries/24444266',
            ),
            'invalid' => array(
                'http://www.dailymile.com/people/EddieJ3',
                'http://www.dailymile.com/',
                'http://www.dailymile.com/signup',
                'http://www.dailymile.com/people/K_P_S',
            ),
        ),
        'ustream' => array(
            'valid' => array(
                'http://www.ustream.tv/channel/americatv2oficial',
                'http://www.ustream.tv/usbc',
                'http://www.ustream.tv/creativelive-3',
                'http://www.ustream.com/channel/nyarukore99/',
                'http://www.ustream.tv/creativeLIVE-rebroadcast',
                'https://www.ustream.tv/creativeLIVE-rebroadcast',
                'http://www.ustream.tv/channel/cbc-tv',
                'http://ustream.com/KTNKENYALIVE',
                'http://www.ustream.tv/channel/radio-unilatina-en-vivo',
            ),
            'invalid' => array(
                'http://ustre.am/142lz',
                'http://www.ustream.tv',
                'http://www.ustream.tv/channel/radio-unilatina-en-vivo/other-stuff',
                'https://www.ustream.tv/platform/pro#itm_source=footer&itm_medium=pro_link&itm_content=Pro Broadcasting&itm_campaign=footer',
                'https://www.ustream.tv/platform/plans',
                'http://www.ustream.tv/howto',
                'http://www.ustream.com/howto',
            ),
        ),
        'cacoo' => array(
            'valid' => array(
                'https://cacoo.com/diagrams/m9uZtizE5I2GkFR6',
                'https://cacoo.com/diagrams/eQe99LVxlYdVCvHA/',
                'https://www.cacoo.com/diagrams/9mG2aVxsBqoH69Qh',
                'https://cacoo.com/diagrams/z4IixDJR44iCqIYw/',
                'http://cacoo.com/diagrams/6NbKDcInDTisv2vU',
                'https://www.cacoo.com/diagrams/ZQ4rgdwXvTZFGQX8',
                'https://cacoo.com/diagrams/zN0Uen7DE0OyCuBC',
                'https://www.cacoo.com/diagrams/dbIT1zRnPJw8lCfj',
            ),
            'invalid' => array(
                'https://cacoo.com/lang/en/?ref=logo',
                'https://cacoo.com/diagrams/6NbKDcInDTisv2vU/other/stuff',
                'https://cacoo.com/lang/en/tour?ref=header',
                'https://cacoo.com/lang/en/faq',
                'https://cacoo.com/signup',
                'https://cacoo.com/',
            ),
            'normalize' => array(
                'https://www.cacoo.com/diagrams/9mG2aVxsBqoH69Qh' => 'https://cacoo.com/diagrams/9mG2aVxsBqoH69Qh',
                'https://www.cacoo.com/diagrams/9mG2aVxsBqoH69Qh/' => 'https://cacoo.com/diagrams/9mG2aVxsBqoH69Qh',
                'https://cacoo.com/diagrams/9mG2aVxsBqoH69Qh/' => 'https://cacoo.com/diagrams/9mG2aVxsBqoH69Qh',
            )
        ),
        'urtak' => array(
            'valid' => array(
                'https://urtak.com/u/9387',
                'https://urtak.com/u/6588/',
                'https://www.urtak.com/u/6576',
                'https://www.urtak.com/u/2779/',
            ),
            'invalid' => array(
                'https://urtak.com/signup',
                'https://urtak.com/',
                'https://urtak.com/u/9387/other/stuff',
                'https://urtak.com/login',
            ),
        ),
        'gmep' => array(
            'valid' => array(
                'https://gmep.org/media/14769',
                'https://gmep.org/media/14767/',
                'https://www.gmep.org/media/14763',
                'https://gmep.org/media/14740',
                'https://gmep.org/media/14725',
                'https://gmep.org/media/14714/',
            ),
            'invalid' => array(
                'https://gmep.org/media/14714/other/stuff',
                'https://gmep.org/media?query=%5Bbroad+complex+tachycardia%5D',
                'https://gmep.org/media',
                'https://gmep.org/about',
                'https://gmep.org/',
            ),
        ),
        'hq23' => array(
            'valid' => array(
                'http://www.23hq.com/brinjal/photo/13305971',
                'http://www.23hq.com/Dan-Tuyet/photo/13301964/',
                'http://23hq.com/gap_mike/photo/13287796',
                'http://www.23hq.com/Bo-Tina/photo/13259658',
                'http://www.23hq.com/euzmar/photo/13254262',
            ),
            'invalid' => array(
                'http://www.23hq.com/23/just-in?world=1&limit=70',
                'http://www.23hq.com/photogroup',
                'http://www.23hq.com/23/signup',
                'http://www.23hq.com/',
            ),
        ),
        'mobypicture' => array(
            'valid' => array(
                'http://www.mobypicture.com/user/Henk_Voermans/view/15880044',
                'http://moby.to/89cw01',
                'http://www.mobypicture.com/user/mjjeje_cojjee/view/15880072',
                'http://www.mobypicture.com/user/Chino_Sanchez/view/15880070/',
                'http://mobypicture.com/user/oskrsal71/view/15880066',
                'http://www.mobypicture.com/user/4/view/15877052',
                'http://moby.to/be1e30',
            ),
            'invalid' => array(
                'http://www.mobypicture.com/user/kakhiel2',
                'http://www.mobypicture.com/groups',
                'http://www.mobypicture.com/',
                'http://moby.to/',
                'http://moby.to/other/stuff/',
                'http://mobypicture.com/user/oskrsal71/view/15880066/other/stuff',
            ),
        ),
        'funnyordie' => array(
            'valid' => array(
                'http://www.funnyordie.com/videos/a1738b0a3f/i-hate-california-lake-tahoe',
                'http://funnyordie.com/videos/8b2b588243/tom-brady-s-best-friend',
                'http://www.funnyordie.com/videos/6b0b308f41/coming-soon-from-funny-or-die-with-will-ferrell/',
                'http://funnyordie.com/videos/c4d450418e/magician-vs-wild',
                'http://www.funnyordie.com/videos/bc5f676260/tony-hale-s-acting-process',
            ),
            'invalid' => array(
                'http://www.funnyordie.com/#search-menu',
                'http://www.funnyordie.com/videos/bc5f676260/tony-hale-s-acting-process/other/stuff',
                'http://www.funnyordie.com/pictures/2d8a7b4876/get-the-look-miley-cyrus', // Pictures dont allow oembed
                'http://www.funnyordie.com/drunkhistory',
                'http://www.funnyordie.com/browse/videos/all/all/most_viewed/this_week',
                'http://www.funnyordie.com/support/widget',
                'http://www.funnyordie.com/marion_cotillard',
            ),
        ),
        'shoudio' => array(
            'valid' => array(
                'http://shoudio.com/user/sowa',
                'http://www.shoudio.com/user/shoister/',
                'http://shoudio.com/user/sowa/status/8171',
                'http://shoudio.com/user/sowa/status/8169',
                'http://shoudio.com/channel/streetmusic',
                'http://shoudio.com/venue/1246/hemlock-tavern.html',
                'http://shoudio.com/venue/1240/park-g-ell.html',
                'http://touch.shoud.io/3862',
            ),
            'invalid' => array(
                'http://shoudio.com/signup',
                'http://shoudio.com',
                'http://touch.shoud.io/3862/other-stuff',
                'http://shoudio.com/collections',
                'http://shoudio.com/venues',
            ),
            'normalize' => array(
                'http://shoudio.com/user/sowa/status/8169' => 'http://shoudio.com/user/sowa/status/8169',
                'http://www.shoudio.com/user/sowa/status/8169' => 'http://shoudio.com/user/sowa/status/8169',
                'http://shoudio.com/user/sowa/status/8169/' => 'http://shoudio.com/user/sowa/status/8169',
            )
        ),
        'ifttt' => array(
            'valid' => array(
                'https://ifttt.com/recipes/112989',
                'https://www.ifttt.com/recipes/111063',
                'https://ifttt.com/recipes/113633/',
                'https://www.ifttt.com/recipes/109983/',
            ),
            'invalid' => array(
                'https://ifttt.com/recipes',
                'https://ifttt.com/',
                'https://ifttt.com/recipes/search?q=gmail',
                'https://ifttt.com/recipes/search',
            ),
        ),
        'huffduffer' => array(
            'valid' => array(
                'http://huffduffer.com/jxpx777/125342',
                'http://huffduffer.com/Jozh/124683/',
                'http://huffduffer.com/shawnpwalsh/124687',
                'http://www.huffduffer.com/erichaberkorn/124686',
                'http://huffduffer.com/bulkorder/124688',
                'http://huffduffer.com/tfehr/124690',
                'http://huffduffer.com/jasonmklug/124719',
            ),
            'invalid' => array(
                'http://huffduffer.com/tags/productivity',
                'http://huffduffer.com/tags/weekly+security+audio+column',
                'http://huffduffer.com/signup/',
                'http://huffduffer.com/',
            ),
        ),
        'videojug' => array(
            'valid' => array(
                'http://www.videojug.com/film/how-to-use-your-ipod-click-wheel',
                'http://www.videojug.com/interview/vehicle-speed',
                'http://videojug.com/film/how-to-get-music-onto-your-ipod-from-a-cd',
                'http://www.videojug.com/film/how-to-make-a-line-graph-in-excel/',
                'http://www.videojug.com/film/how-to-fix-a-scratched-xbox-360-game',
                'http://www.videojug.com/film/how-to-change-a-car-battery-2',
            ),
            'invalid' => array(
                'http://www.videojug.com/tag/video-games-and-consoles',
                'http://www.videojug.com/tag/technology-and-cars',
                'http://www.videojug.com/film/technology-and-cars/other/stuff',
                'http://www.videojug.com',
            ),
        ),
        'officialfm' => array(
            'valid' => array(
                'http://official.fm/playlists/cxBp?from=homepage&track_id=5dtD',
                'http://official.fm/playlists/Dztx',
                'http://official.fm/tracks/CLZo',
                'http://official.fm/tracks/1Z1u',
                'http://official.fm/tracks/2u3X',
                'http://official.fm/tracks/2eUw',
            ),
            'invalid' => array(
                'http://official.fm/login',
                'http://official.fm/join',
                'http://official.fm/',
                'http://official.fm/developers',
                'http://official.fm/privacy',
            ),
            'normalize' => array(
                'http://official.fm/playlists/Dztx?from=homepage&track_id=9rk1' => 'http://official.fm/playlists/Dztx',
                'http://www.official.fm/playlists/Dztx?from=homepage&track_id=9rk1' => 'http://official.fm/playlists/Dztx',
                'http://www.official.fm/playlists/Dztx' => 'http://official.fm/playlists/Dztx',
                'http://official.fm/tracks/Dztx?from=homepage&track_id=9rk1' => 'http://official.fm/tracks/Dztx',
            )
        ),
        'justintv' => array(
            'valid' => array(
                'http://www.justin.tv/skyfire_trains_tv',
                'http://www.justin.tv/notstr8',
                'http://www.justin.tv/cpnlive/',
                'http://justin.tv/crazy_american',
                'http://www.justin.tv/marksr',
                'http://www.justin.tv/thegeekgroup',
                'http://justin.tv/clubzonefm/',
            ),
            'invalid' => array(
                'http://www.justin.tv/directory/featured',
                'http://www.justin.tv/',
                'http://www.justin.tv/thegeekgroup/otherstuff/hey',
                'http://www.justin.tv/user/login',
                'http://www.justin.tv/p/about_us',
                'http://www.justin.tv/directory/social',
                'http://www.justin.tv/directory/sports',
            ),
            'normalize' => array(
                'http://justin.tv/directory/' => 'http://www.justin.tv/directory',
                'http://justin.tv/directory' => 'http://www.justin.tv/directory',
                'http://www.justin.tv/directory' => 'http://www.justin.tv/directory',
            )
        ),
        'sapo' => array(
            'valid' => array(
                'http://videos.sapo.pt/1z2ieEQvWVZ6af0nQZFN',
                'http://videos.sapo.pt/ZpO1SNwJwjjjmuOlDqGN/',
                'http://videos.sapo.pt/2VA8L9zp3eSUn0HTsG3G',
                'http://videos.sapo.pt/R3wmOAGyjZFRkwdRbmHs',
                'http://videos.sapo.pt/R5Y9lJteSAzyf5V5uAhD',
                'http://videos.sapo.pt/sk9LmQAH0PQ4Pz1iupkV',
                'http://videos.sapo.pt/HAUithzZK3SShqIRGQBA',
                'http://videos.sapo.pt/eFdSRwoVzYQQ4NVEtGF6',
            ),
            'invalid' => array(
                'http://videos.sapo.pt/top.html',
                'http://www.sapo.pt/',
                'http://videos.sapo.pt/tag.html?insanospt',
                'http://videos.sapo.pt/categorias.html',
                'http://videos.sapo.pt/sapotv.html',
            ),
        ),
        'screenr' => array(
            'valid' => array(
                'http://www.screenr.com/eJvs',
                'http://www.screenr.com/5xfs/',
                'http://screenr.com/mkus',
                'http://www.screenr.com/js0H',
            ),
            'invalid' => array(
                'http://www.screenr.com/',
                'http://www.screenr.com/record',
                'http://www.screenr.com/stream',
                'http://www.screenr.com/help',
                'http://www.screenr.com/T80H/other/stuff',
                'http://www.screenr.com/T80H/other',
            ),
        ),
        'circuitlab' => array(
            'valid' => array(
                'https://www.circuitlab.com/circuit/e38756/555-timer-as-astable-multivibrator-oscillator/',
                'https://www.circuitlab.com/circuit/fby849/bjt-cascoded-active-load-differential-amplifier-with-cmfb',
                'https://circuitlab.com/circuit/4da864/diode-half-wave-rectifier/',
                'https://circuitlab.com/circuit/z79rqm/leds-with-resistor-biasing',
                'https://www.circuitlab.com/circuit/42475b/mosfet-and-resistor-nand-gate/',
            ),
            'invalid' => array(
                'https://www.circuitlab.com/',
                'https://www.circuitlab.com/forums/',
                'https://www.circuitlab.com/circuit/z79rqm/leds-with-resistor-biasing/other/stuff',
            ),
            'normalize' => array(
                'https://circuitlab.com/circuit/4da864/diode-half-wave-rectifier/' => 'https://www.circuitlab.com/circuit/4da864/diode-half-wave-rectifier/',
                'https://circuitlab.com/circuit/z79rqm/leds-with-resistor-biasing' => 'https://www.circuitlab.com/circuit/z79rqm/leds-with-resistor-biasing',
            )
        ),
        'geographci' => array(
            'valid' => array(
                'http://channel-islands.geographs.org/photo/1166',
                'http://channel-islands.geographs.org/photo/952',
                'http://channel-islands.geographs.org/photo/1231',
                'http://channel-islands.geographs.org.je/photo/961',
                'http://channel-islands.geographs.org.gg/photo/984',
                'http://channel-islands.geographs.org/photo/656',
            ),
            'invalid' => array(
                'http://channel-islands.geographs.org/discuss/',
                'http://channel-islands.geographs.org/submit.php',
                'http://channel-islands.geographs.org/submit.php',
                'http://channel-islands.geographs.org/list.php',
            ),
        ),
        'geographde' => array(
            'valid' => array(
                'http://geo-en.hlipp.de/photo/36058',
                'http://geo-en.hlipp.de/photo/22092/',
                'http://geo.hlipp.de/photo/35233',
                'http://geo.hlipp.de/photo/30213',
                'http://germany.geograph.org/photo/40426',
                'http://germany.geograph.org/photo/36058',
            ),
            'invalid' => array(
                'http://geo-en.hlipp.de/discuss/',
                'http://geo-en.hlipp.de/latlong.php',
                'http://geo-en.hlipp.de/gallery/historische_bauten_historic_buildings_127',
                'http://geo.hlipp.de/photo/35233/more-stuff',
            ),
        ),
        'geographuk' => array(
            'valid' => array(
                'http://www.geograph.org.uk/photo/3619867',
                'http://www.geograph.org.uk/photo/2308394/',
                'http://www.geograph.org.uk/photo/1449749',
                'http://www.geograph.co.uk/photo/292839',
                'http://www.geograph.ie/photo/353656',
                'http://www.geograph.org.uk/photo/1146430',
                'http://www.geograph.ie/photo/973235',
            ),
            'invalid' => array(
                'http://www.geograph.ie/gallery.php',
                'http://www.geograph.org/gallery.php?tab=highest',
                'http://www.geograph.org.uk/photo/2000063/other/stuff',
                'http://www.geograph.org.uk/photo/words',
            ),
        ),
        'chirbit' => array(
            'valid' => array(
                'http://chirb.it/w3gGKr',
                'http://chirb.it/gJDBHO',
                'http://chirb.it/wtJs5e/',
                'http://www.chirb.it/185err',
                'http://chirb.it/x0sw0k',
                'http://chirb.it/zGt9tG',
            ),
            'invalid' => array(
                'http://chirbit.it/top-50-chirbits-this-week.php',
                'http://www.chirbit.com/top-50-chirbits-this-week.php',
                'http://www.chirbit.com/',
                'http://chirb.it',
            ),
        ),
        'ted' => array(
            'valid' => array(
                'http://www.ted.com/talks/david_gallo_shows_underwater_astonishments.html',
                'http://www.ted.com/talks/michael_dickinson_how_a_fly_flies.html',
                'http://www.ted.com/talks/jon_ronson_strange_answers_to_the_psychopath_test.html',
                'http://www.ted.com/talks/lang/da/jill_bolte_taylor_s_powerful_stroke_of_insight.html',
                'http://www.ted.com/talks/lang/fa/jill_bolte_taylor_s_powerful_stroke_of_insight.html',
            ),
            'invalid' => array(
                'http://www.ted.com/',
                'http://www.ted.com/playlists/5/insects_are_awesome.html',
                'http://www.ted.com/tedx',
                'http://www.ted.com/talks',
            ),
        ),
        'ifixit' => array(
            'valid' => array(
                'http://www.ifixit.com/Guide/Replacing+iPad+4+CDMA+Logic+Board/16458',
                'http://www.ifixit.com/Guide/Repairing+IBM+ThinkPad+T41+BIOS+Battery/2916/1',
                'http://www.ifixit.com/Teardown/Plastic+Chair+Teardown/5989/1',
                'http://ifixit.com/Teardown/iPad+2+3G+GSM+%26+CDMA+Teardown/5127/1/',
                'http://www.ifixit.com/Teardown/AirPort+Extreme+A1521+Teardown/15044/',
            ),
            'invalid' => array(
                'http://www.ifixit.com/User/18/Walter+Galan',
                'http://www.ifixit.com/Guide',
                'http://www.ifixit.com/',
                'http://www.ifixit.com/Guide/login/register',
                'http://www.ifixit.com/Guide/login',
            ),
        ),
        'bambuser' => array(
            'valid' => array(
                'http://bambuser.com/v/3853413',
                'http://bambuser.com/v/3828591/',
                'http://bambuser.com/channel/peterpstuttgart',
                'http://www.bambuser.com/v/3828416',
                'http://bambuser.com/v/3847370',
            ),
            'invalid' => array(
                'http://bambuser.com/broadcasts',
                'http://bambuser.com/premium',
                'http://bambuser.com/tag/Business',
                'http://bambuser.com/tag/TMSO',
                'http://bambuser.com/',
            ),
            'normalize' => array(
                'http://www.bambuser.com/v/3847370/' => 'http://bambuser.com/v/3847370',
            ),
        ),
        'githubgist' => array(
            'valid' => array(
                'https://gist.github.com/mpratt/3177700',
                'https://gist.github.com/mpratt/5671743/',
                'https://gist.github.com/733951',
                'https://gist.github.com/ashaw/6308796',
                'https://gist.github.com/mpratt/3177700#file-database-txt'
            ),
            'invalid' => array(
                // 'https://github.com/ashaw/6308796',
                'https://gist.github.com/mpratt',
                'https://gist.github.com/',
                'https://gist.github.com/discover/',
            ),
            'normalize' => array(
                'https://gist.github.com/mpratt/3177700' => 'https://gist.github.com/3177700',
                'https://gist.github.com/733951' => 'https://gist.github.com/733951',
                'https://gist.github.com/LJPH/6308712#file-comet_-idea_description-html' => 'https://gist.github.com/6308712',
            ),
        ),
        'aolon' => array(
            'valid' => array(
                'http://on.aol.com/video/plans-to-clone-john-lennon-using-one-of-his-teeth-517906689?icid=OnHomepageL1_Tag',
                'http://on.aol.com/video/three-good-news-stories-to-brighten-your-day-517906768',
                'http://on.aol.com/video/kid-president-meets-beyonc--517906781',
                'http://on.aol.com/video/obama-comes-out-against-dog-breed-specific-legislation-517905316',
                'http://www.5min.com/video/obama-comes-out-against-dog-breed-specific-legislation-517905316',
                'http://5min.com/video/obama-comes-out-against-dog-breed-specific-legislation-517905316',
            ),
            'invalid' => array(
                'http://5min.com/obama-comes-out-against-dog-breed-specific-legislation-517905316',
                'http://on.aol.com/video/',
                'http://on.aol.com/channel/parenting',
                'http://on.aol.com/originals',
                'http://on.aol.com/show/CandidlyNicole-517742769',
                'http://on.aol.com/bubble/omg/1',
                'http://on.aol.com',
            ),
            'normalize' => array(
                'http://5min.com/video/obama-comes-out-against-dog-breed-specific-legislation-517905316' => 'http://on.aol.com/video/obama-comes-out-against-dog-breed-specific-legislation-517905316',
                'http://on.aol.com/video/plans-to-clone-john-lennon-using-one-of-his-teeth-517906689?icid=OnHomepageL1_Tag' => 'http://on.aol.com/video/plans-to-clone-john-lennon-using-one-of-his-teeth-517906689',
            ),
        ),
        'animoto' => array(
            'valid' => array(
                'http://animoto.com/play/JzwsBn5FRVxS0qoqcBP5zA',
                'http://animoto.com/play/JzwsBn5FRVxS0qoqcBP5zA/',
                'http://www.animoto.com/play/JzwsBn5FRVxS0qoqcBP5zA/',
            ),
            'invalid' => array(
                'http://animoto.com/features',
                'http://animoto.com/#examples',
                'http://www.animoto.com/play/JzwsBn5FRVxS0qoqcBP5zA/other-stuff',
                'http://animoto.com/',
            ),
        ),
        'coub' => array(
            'valid' => array(
                'http://coub.com/view/2gik7tu6',
                'http://coub.com/view/1i2na5tm',
                'http://www.coub.com/view/2oa3zbsr',
                'http://coub.com/embed/20v82p5j',
                'http://coub.com/embed/omwe0oe/',
                'http://coub.com/view/2m7mett8/',
                'http://coub.com/embed/29zkqoco',
            ),
            'invalid' => array(
                'http://coub.com/view/2m7mett8/other-stuff/',
                'http://coub.com/explore/art-design',
                'http://coub.com/explore/girls',
                'http://coub.com/embed/',
                'http://coub.com/view/',
                'http://coub.com/',
            ),
            'normalize' => array(
                'http://coub.com/view/231nevc?small_suggest_place=3' => 'http://coub.com/view/231nevc',
                'http://coub.com/view/231nevc?small_suggest_place=3&stuff=hihi-hi' => 'http://coub.com/view/231nevc',
                'http://www.coub.com/view/231nevc?small_suggest_place=3&stuff=hihi-hi' => 'http://coub.com/view/231nevc',
            )
        ),
        'kickstarter' => array(
            'valid' => array(
                'http://www.kickstarter.com/projects/1330686256/americas-candy-all-natural-vegan-and-allergy-frien?ref=home_popular',
                'http://www.kickstarter.com/projects/yonder/dino-pet-a-living-bioluminescent-night-light-pet?ref=home_popular',
                'http://www.kickstarter.com/projects/762504755/apparitions-from-the-inferno?ref=home_location',
                'http://kickstarter.com/projects/1093644807/and-the-meek-shall-inherit',
                'http://www.kickstarter.com/projects/940737263/a-very-special-new-stripped-down-sea-wolf-album',
                'http://www.kickstarter.com/projects/DaveRyan/owlgirls',
                'http://www.kickstarter.com/projects/lenswithaview/standing-in-the-stars-the-peter-mayhew-story',
            ),
            'invalid' => array(
                'http://www.kickstarter.com/discover',
                'http://www.kickstarter.com/start',
                'http://www.kickstarter.com/',
                'http://www.kickstarter.com/DaveRyan/owlgirls',
                'http://www.kickstarter.com/projects/DaveRyan',
            ),
            'normalize' => array(
                'http://www.kickstarter.com/projects/1330686256/americas-candy-all-natural-vegan-and-allergy-frien?ref=home_popular' => 'http://www.kickstarter.com/projects/1330686256/americas-candy-all-natural-vegan-and-allergy-frien',
                'http://www.kickstarter.com/projects/1330686256/americas-candy-all-natural-vegan-and-allergy-frien?ref=home_popular&other=stuff-yeah' => 'http://www.kickstarter.com/projects/1330686256/americas-candy-all-natural-vegan-and-allergy-frien',
                'http://www.kickstarter.com/projects/1330686256/americas-candy-all-natural-vegan-and-allergy-frien' => 'http://www.kickstarter.com/projects/1330686256/americas-candy-all-natural-vegan-and-allergy-frien',
                'http://kickstarter.com/projects/1330686256/americas-candy-all-natural-vegan-and-allergy-frien' => 'http://www.kickstarter.com/projects/1330686256/americas-candy-all-natural-vegan-and-allergy-frien',
                'https://kickstarter.com/projects/1330686256/americas-candy-all-natural-vegan-and-allergy-frien' => 'https://www.kickstarter.com/projects/1330686256/americas-candy-all-natural-vegan-and-allergy-frien',
            )
        ),
        'mixcloud' => array(
            'valid' => array(
                'http://www.mixcloud.com/quietmusic/quietmusic-august-18-hour-1-excerpt/',
                'http://www.mixcloud.com/sub88/mental-place-25/',
                'http://www.mixcloud.com/FluidRadio/casual-curses-a-mixtape-by-cooper-cult/',
                'http://mixcloud.com/aboveandbeyond/above-beyond-abgt-041/',
                'http://www.mixcloud.com/CarlCox/carl-cox-ibiza-the-revolution-unites-week-6',
                'http://www.mixcloud.com/TechnoLiveSets/josephcapriati-live-aquasella-festival-2013-spain-02-08-2013/',
                'http://www.mixcloud.com/truthoughts/tru-thoughts-presents-unfold-180813/',
            ),
            'invalid' => array(
                'http://www.mixcloud.com/truthoughts/',
                'http://www.mixcloud.com/categories/ambient-chillout/',
                'http://www.mixcloud.com/categories/comedy/',
                'http://www.mixcloud.com/about/',
                'http://www.mixcloud.com/upload/',
                'http://www.mixcloud.com/advertise/create/',
                'http://www.mixcloud.com/developers/documentation/',
            ),
        ),
        'rdio' => array(
            'valid' => array(
                'http://rd.io/x/Q1IjXC8s',
                'http://www.rdio.com/artist/The_Black_Keys/album/Brothers/',
                'http://www.rdio.com/artist/Nine_Inch_Nails/album/The_Downward_Spiral_1/track/Hurt/',
                'http://rdio.com/people/Pitchfork/playlists/13082/Top_Singles_of_2000-2004/',
                'http://www.rdio.com/artist/Washed_Out/album/Paracosm_1/',
                'http://www.rdio.com/artist/Earl_Sweatshirt/album/Doris/',
                'http://www.rdio.com/artist/Marre/album/Sombras_De_Luz_1',
            ),
            'invalid' => array(
                'http://rd.io/Q1IjXC8s',
                'http://www.rdio.com/artist/The_Black_Keys/',
                'http://www.rdio.com',
                'http://www.rdio.com/browse/new',
                'http://www.rdio.com/browse/charts/albums',
            ),
        ),
        'instagram' => array(
            'valid' => array(
                'http://instagram.com/p/TCg0AoLjoH/#',
                'http://instagram.com/p/Q8fPYGLjtB',
                'http://instagram.com/p/Rqlny2Ljk7/',
                'http://instagr.am/p/TCg0AoLjoH/#',
                'http://instagr.am/p/V8UMy0LjpX',
            ),
            'invalid' => array(
                'http://instagram.com/stuff/Rqlny2Ljk7/',
                'http://instagram.com/p/Rqlny2Ljk7/other/stuff',
                'http://instagram.com',
                'http://instagr.am',
            ),
        ),
        'soundcloud' => array(
            'valid' => array(
                'https://soundcloud.com/lospetitfellas/ser-libre-ft-alejandro-cole',
                'https://www.soundcloud.com/lospetitfellas/1150pm/',
                'https://soundcloud.com/lospetitfellas/sets/queridofrankie/',
                'https://www.soundcloud.com/comedy-central/the-unf-kables-dave-attell/',
                'https://soundcloud.com/smodco/babbleon-136',
                'https://soundcloud.com/smodco/isellcomics-93',
                'https://soundcloud.com/groups/rap-hiphop/',
                'https://soundcloud.com/groups/house-dj-sets',
                'https://soundcloud.com/tyrantofdeath/injection-remastered-2013/',
                'https://soundcloud.com/fernandomeira',
            ),
            'invalid' => array(
                'https://soundcloud.com/explore',
                'https://soundcloud.com/groups',
                'https://soundcloud.com',
                '',
            ),
        ),
        'slideshare' => array(
            'valid' => array(
                'http://www.slideshare.net/shvmdhwn/personal-branding-do-it-yourself',
                'http://slideshare.net/robinhbchan/project-bbx',
                'http://www.slideshare.net/CNTMAN216/5linxbusinessopppresentation/',
                'http://www.slideshare.net/appsfire/app-score-report-july-2012',
                'http://www.slideshare.net/RobertGonzalez11/intelligent-onlinemarketingformedical/',
                'http://www.slideshare.net/andreasklinger/startup-metrics-a-love-story',
                'http://www.slideshare.net/FiratDemirel/hyperloop-alpha-elon-musk',
            ),
            'invalid' => array(
                'http://www.slideshare.net/newlist/popular/language/de',
                'http://www.slideshare.net/newlist/popular/week',
                'http://www.slideshare.net/newlist/popular',
                'http://www.slideshare.net/FiratDemirel',
                'http://www.slideshare.net',
                'http://www.slideshare.net/search/slideshow?searchfrom=header&q=start',
            ),
        ),
        'clikthrough' => array(
            'valid' => array(
                'http://www.clikthrough.com/theater/video/23//en-US',
                'http://clikthrough.com/theater/video/19/',
                'http://www.clikthrough.com/theater/video/49',
                'http://clikthrough.com/theater/video/39',
                'http://www.clikthrough.com/theater/video/30',
            ),
            'invalid' => array(
                'http://www.clikthrough.com/theater/video/letters',
                'http://www.clikthrough.com/theater/video',
                'http://www.clikthrough.com/theater/',
                'http://www.clikthrough.com/products/',
                'http://www.clikthrough.com/videos/',
                'http://www.clikthrough.com/artists/',
            ),
        ),
        'speakerdeck' => array(
            'valid' => array(
                'https://speakerdeck.com/sva_1981/zhi-zhi-ju-tesuto',
                'http://speakerdeck.com/globalmanagergroup/iso-9001-2008-qms-standard-certification-documents',
                'https://speakerdeck.com/oklahomaok/the-university-at-hiyoshi-they-are-crazy/',
                'http://www.speakerdeck.com/librarianavenger/librarian-avengers-film-rating-system',
                'http://speakerdeck.com/vinull/quest-for-fun',
            ),
            'invalid' => array(
                'https://speakerdeck.com/p/featured',
                'https://speakerdeck.com/c/programming',
                'https://speakerdeck.com/signup',
                'https://speakerdeck.com/',
                'https://speakerdeck.com/search?q=what+up',
                'https://speakerdeck.com/jamesclay/what-do-you-mean-someone-made-them-up/other-stuff',
            ),
        ),
        'appnet' => array(
            'valid' => array(
                'https://alpha.app.net/lesechos/post/9152136',
                'https://alpha.app.net/vowels/post/8244279/photo/1',
                'https://alpha.app.net/breakingnews/post/9141658/',
                'http://alpha.app.net/popsugar/post/9145139',
                'https://photos.app.net/8244279/1',
            ),
            'invalid' => array(
                'https://unknown.app.net/breakingnews/post/9141658/',
                'https://aplpha.app.net/breakingnews/post/string/',
                'https://aplpha.app.net/post/9141658/',
                'https://aplpha.app.net/breakingnews/9141658/',
                'https://aplpha.app.net',
            ),
        ),
        'bliptv' => array(
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
        'polleverywhere' => array(
            'valid' => array(
                'http://www.polleverywhere.com/free_text_polls/LTk2NTg4NDI4MQ',
                'http://www.polleverywhere.com/free_text_polls/NDk3OTE0ODgy/',
                'http://polleverywhere.com/multiple_choice_polls/LTQxNTU4OTUx',
                'http://www.polleverywhere.com/multiple_choice_polls/LTE5NTcwMzU0MjA/',
                'http://www.polleverywhere.com/polls/OmAP71g5VGIVXIi'
            ),
            'invalid' => array(
                'https://www.polleverywhere.com/login',
                'http://www.polleverywhere.com/plans',
                'http://www.polleverywhere.com',
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
            ),
            'normalize' => array(
                'https://twitter.com/#!RalphGarman/status/362589356495605762/' => 'https://twitter.com/RalphGarman/status/362589356495605762',
                'https://twitter.com/#!RalphGarman/status/362589356495605762' => 'https://twitter.com/RalphGarman/status/362589356495605762'
            )
        ),
        'dotsub' => array(
            'valid' => array(
                'http://dotsub.com/view/f2a85663-d9eb-4d92-bb61-fd960c401b23',
                'http://dotsub.com/view/0ebc725c-a805-4486-a1df-c1e7dccf8c6e/',
                'http://www.dotsub.com/view/dcef6c2a-3fb7-4ab1-9bc8-fd621b2c3972',
                'http://dotsub.com/media/b7a2859d-69a3-45f2-8e4e-88f2f15b3f97',
                'http://dotsub.com/view/85897135-c6ee-4c93-acdd-d7e7f4d08b6e',
                'http://dotsub.com/view/99eaba09-787a-40a9-9125-27a729de71db',
            ),
            'invalid' => array(
                'http://dotsub.com/view/xxx-xxx-xxxx-xxxx-xxxxx', // It seems that dotsub uses base 64 only as id
                'http://dotsub.com/view/',
                'http://dotsub.com/view/?',
                'http://dotsub.com/view/mostviewed',
                'http://dotsub.com/view/language/both/dug',
                'http://dotsub.com/view/99eaba09-787a-40a9-9125-27a729de71db/other/stuff',
                'http://dotsub.com',
            ),
            'normalize' => array(
                'http://www.dotsub.com/media/396b2b58-9a9c-42f3-b7cb-4a282964b11c/embed/' => 'http://dotsub.com/view/396b2b58-9a9c-42f3-b7cb-4a282964b11c',
                'http://dotsub.com/media/5af2ea32-1aa1-4fa7-9d36-b3a01e841ca2/embed/' => 'http://dotsub.com/view/5af2ea32-1aa1-4fa7-9d36-b3a01e841ca2',
            )
        ),
        'scribd' => array(
            'valid' => array(
                'http://www.scribd.com/doc/155739836/The-Time-Travel-Megapack-26-Modern-and-Classic-Science-Fiction-Stories',
                'http://www.scribd.com/doc/155740115/Daughter-of-the-Amazon-The-Golden-Amazon-Saga-Book-Five/',
                'http://scribd.com/doc/155740472/Alien-Abduction-The-Wiltshire-Revelations?=hey',
                'http://scribd.com/doc/119667881/Lessons-in-Lingerie/',
                'http://www.scribd.com/doc/115726071/10-Practical-Tools-for-a-Resilient-Local-Economy',
                'http://www.scribd.com/doc/14850258/Research-Motives-of-Vinyl-Use-Author-Robert-Arndt',
            ),
            'invalid' => array(
                'http://www.scribd.com/explore',
                'http://www.scribd.com/explore/Types/Featured?p=0',
                'http://scribd.com/doc/Lessons-in-Lingerie/',
                'http://scribd.com/119667881/Lessons-in-Lingerie/',
                'http://scribd.com/doc/119667881/Lessons-in-Lingerie/other-stuff',
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
        'nfb' => array(
            'valid' => array(
                'http://www.nfb.ca/film/abegweit_en',
                'http://nfb.ca/film/act_of_dishonour',
                'http://www.nfb.ca/film/after_axe/',
                'http://nfb.ca/film/alexis_tremblay_habitant_en',
                'http://nfb.ca/film/the_animal_movie/',
                'http://www.nfb.ca/film/anniversary',
            ),
            'invalid' => array(
                'http://www.nfb.ca/explore-all-directors/tom-jackson/',
                'http://www.nfb.ca',
                'http://www.nfb.ca/film/',
                'http://nfb.ca/film/',
                'http://www.nfb.ca/explore-all-films/',
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

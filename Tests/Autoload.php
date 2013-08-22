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
        'githubgist' => array(
            'valid' => array(
                'https://gist.github.com/mpratt/3177700',
                'https://gist.github.com/mpratt/5671743/',
                'https://gist.github.com/733951',
                'https://gist.github.com/LJPH/6308712#file-comet_-idea_description-html',
                'https://gist.github.com/ashaw/6308796',
            ),
            'invalid' => array(
                'https://github.com/ashaw/6308796', // Not gist.github.com
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

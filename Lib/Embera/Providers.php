<?php
/**
 * Providers.php
 *
 * @package Embera
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera;

/**
 * Finds and loads Services/Providers based on the
 * host of a url.
 */
class Providers
{
    /** @var array Configuration Settings */
    protected $config = array();

    /** @var object instance of \Embera\Oembed*/
    protected $oembed;

    /** @var array Custom parameters for each host/provider */
    protected $customParams = array();

    /** @var array Hosts with wildcards, calculated at runtime */
    protected $wildCardHosts = array();

    /** @var array Massive array with the mapping of host -> provider class relation. */
    protected $services = array(
        '*.acast.com' => '\Embera\Providers\Acast',
        '*.blip.tv' => '\Embera\Providers\BlipTV',
        '*.boxofficebuz.com' => '\Embera\Providers\BoxOfficeBuz',
        '*.dailymotion.com' => '\Embera\Providers\DailyMotion',
        '*.deviantart.com' => '\Embera\Providers\Deviantart',
        '*.didacte.com' => '\Embera\Providers\Didacte',
        '*.indacolive.com' => '\Embera\Providers\Indaco',
        '*.polldaddy.com' => '\Embera\Providers\PollDaddy',
        '*.scribd.com' => '\Embera\Providers\Scribd',
        '*.shoud.io' => '\Embera\Providers\Shoudio',
        '*.shoudio.com' => '\Embera\Providers\Shoudio',
        '*.silk.co' => '\Embera\Providers\Silk',
        '*.slideshare.net' => '\Embera\Providers\SlideShare',
        '*.soundcloud.com' => '\Embera\Providers\SoundCloud',
        '*.spotify.com' => '\Embera\Providers\Spotify',
        '*.twitch.tv' => '\Embera\Providers\Twitch',
        '*.viously.com' => '\Embera\Providers\Viously',
        '*.wizer.me' => '\Embera\Providers\Wizer',
        '23hq.com' => '\Embera\Providers\Hq23',
        '5min.com' => '\Embera\Providers\AolOn',
        'alpha.app.net' => '\Embera\Providers\AppNet',
        'animatron.com' => '\Embera\Providers\Animatron',
        'animoto.com' => '\Embera\Providers\Animoto',
        'audiosnaps.com' => '\Embera\Providers\AudioSnaps',
        'bambuser.com' => '\Embera\Providers\Bambuser',
        'blog.wordpress.tv' => '\Embera\Providers\WordpressTV',
        'c9ng.com' => '\Embera\Providers\CrowdRanking',
        'cacoo.com' => '\Embera\Providers\Cacoo',
        'channel-islands.geograph.org' => '\Embera\Providers\GeographCI',
        'channel-islands.geographs.org' => '\Embera\Providers\GeographCI',
        'channel-islands.geographs.org.gg' => '\Embera\Providers\GeographCI',
        'channel-islands.geographs.org.je' => '\Embera\Providers\GeographCI',
        'chirb.it' => '\Embera\Providers\Chirbit',
        'circuitlab.com' => '\Embera\Providers\CircuitLab',
        'clipland.com' => '\Embera\Providers\Clipland',
        'clyp.it' => '\Embera\Providers\Clyp',
        'codepoints.net' => '\Embera\Providers\Codepoints',
        'collegehumor.com' => '\Embera\Providers\CollegeHumor',
        'content.streamonecloud.net' => '\Embera\Providers\StreamOneCloud',
        'coub.com' => '\Embera\Providers\Coub',
        'crowdranking.com' => '\Embera\Providers\CrowdRanking',
        'dai.ly' => '\Embera\Providers\DailyMotion',
        'dailymile.com' => '\Embera\Providers\DailyMile',
        'dipity.com' => '\Embera\Providers\Dipity',
        'dotsub.com' => '\Embera\Providers\DotSub',
        'edocr.com' => '\Embera\Providers\Edocr',
        'edumedia-sciences.com' => '\Embera\Providers\EduMedia',
        'egliseinfo.catholique.fr' => '\Embera\Providers\EgliseInfo',
        'facebook.com' => '\Embera\Providers\Facebook',
        'fav.me' => '\Embera\Providers\Deviantart',
        'flic.kr' => '\Embera\Providers\Flickr',
        'flickr.com' => '\Embera\Providers\Flickr',
        'funnyordie.com' => '\Embera\Providers\FunnyOrDie',
        'geo-en.hlipp.de' => '\Embera\Providers\GeographDe',
        'geo.hlipp.de' => '\Embera\Providers\GeographDe',
        'geograph.co.uk' => '\Embera\Providers\GeographUk',
        'geograph.ie' => '\Embera\Providers\GeographUk',
        'geograph.org.uk' => '\Embera\Providers\GeographUk',
        'germany.geograph.org' => '\Embera\Providers\GeographDe',
        'gettyimages.com' => '\Embera\Providers\GettyImages',
        'gfycat.com' => '\Embera\Providers\Gfycat',
        'gist.github.com' => '\Embera\Providers\GithubGist',
        'gmep.org' => '\Embera\Providers\Gmep',
        'gty.im' => '\Embera\Providers\GettyImages',
        'gyazo.com' => '\Embera\Providers\Gyazo',
        'huffduffer.com' => '\Embera\Providers\Huffduffer',
        'hulu.com' => '\Embera\Providers\Hulu',
        'ifixit.com' => '\Embera\Providers\IFixIt',
        'ifttt.com' => '\Embera\Providers\IFTTT',
        'infogr.am' => '\Embera\Providers\Infogram',
        'infogram.com' => '\Embera\Providers\Infogram',
        'instagr.am' => '\Embera\Providers\Instagram',
        'instagram.com' => '\Embera\Providers\Instagram',
        'issuu.com' => '\Embera\Providers\Issuu',
        'kickstarter.com' => '\Embera\Providers\Kickstarter',
        'kidoju.com' => '\Embera\Providers\Kidoju',
        'learningapps.org' => '\Embera\Providers\LearningApps',
        'live.amcharts.com' => '\Embera\Providers\AmCharts',
        'm.youtube.com' => '\Embera\Providers\Youtube',
        'mathembed.com' => '\Embera\Providers\Mathembed',
        'meetu.ps' => '\Embera\Providers\Meetup',
        'meetup.com' => '\Embera\Providers\Meetup',
        'mix.office.com' => '\Embera\Providers\Officemix',
        'mixcloud.com' => '\Embera\Providers\MixCloud',
        'moby.to' => '\Embera\Providers\MobyPicture',
        'mobypicture.com' => '\Embera\Providers\MobyPicture',
        'nfb.ca' => '\Embera\Providers\NFB',
        'official.fm' => '\Embera\Providers\OfficialFM',
        'on.aol.com' => '\Embera\Providers\AolOn',
        'onsizzle.com' => '\Embera\Providers\Sizzle',
        'oumy.com' => '\Embera\Providers\Oumy',
        'pastery.net' => '\Embera\Providers\Pastery',
        'photos.app.net' => '\Embera\Providers\AppNet',
        'play.soundsgood.co' => '\Embera\Providers\Soundsgood',
        'polleverywhere.com' => '\Embera\Providers\PollEveryWhere',
        'portfolium.com' => '\Embera\Providers\Portfolium',
        'public.chartblocks.com' => '\Embera\Providers\Chartblocks',
        'punters.com.au' => '\Embera\Providers\Punters',
        'rapidengage.com' => '\Embera\Providers\Rapidengage',
        'rd.io' => '\Embera\Providers\Rdio',
        'rdio.com' => '\Embera\Providers\Rdio',
        'releasewire.com' => '\Embera\Providers\ReleaseWire',
        'repubhub.icopyright.net' => '\Embera\Providers\RepubHub',
        'reverbnation.com' => '\Embera\Providers\Reverbnation',
        'revision3.com' => '\Embera\Providers\Revision3',
        'roomshare.jp' => '\Embera\Providers\Roomshare',
        'rumble.com' => '\Embera\Providers\Rumble',
        'rutube.ru' => '\Embera\Providers\Rutube',
        'rwire.com' => '\Embera\Providers\ReleaseWire',
        'screencast.com' => '\Embera\Providers\Screencast',
        'screenr.com' => '\Embera\Providers\Screenr',
        'shortnote.jp' => '\Embera\Providers\ShortNote',
        'showtheway.io' => '\Embera\Providers\Showtheway',
        'sketchfab.com' => '\Embera\Providers\Sketchfab',
        'soundsgood.co' => '\Embera\Providers\Soundsgood',
        'speakerdeck.com' => '\Embera\Providers\Speakerdeck',
        'spoti.fi' => '\Embera\Providers\Spotify',
        'spreaker.com' => '\Embera\Providers\Spreaker',
        'sta.sh' => '\Embera\Providers\Deviantart',
        'streamable.com' => '\Embera\Providers\Streamable',
        'sway.com' => '\Embera\Providers\Sway',
        'ted.com' => '\Embera\Providers\Ted',
        'theysaidso.com' => '\Embera\Providers\TheySaidSo',
        'twitter.com' => '\Embera\Providers\Twitter',
        'twitter.yfrog.com' => '\Embera\Providers\YFrog',
        'ultimedia.com' => '\Embera\Providers\Digiteka',
        'ustream.com' => '\Embera\Providers\Ustream',
        'ustream.tv' => '\Embera\Providers\Ustream',
        'verse.media' => '\Embera\Providers\Verse',
        'vevo.com' => '\Embera\Providers\Vevo',
        'viddler.com' => '\Embera\Providers\Viddler',
        'video.yandex.ru' => '\Embera\Providers\Yandex',
        'videofork.com' => '\Embera\Providers\VideoFork',
        'videojug.com' => '\Embera\Providers\VideoJug',
        'videos.sapo.pt' => '\Embera\Providers\Sapo',
        'vidl.it' => '\Embera\Providers\Vidlit',
        'vimeo.com' => '\Embera\Providers\Vimeo',
        'vine.co' => '\Embera\Providers\Vine',
        'wootled.com' => '\Embera\Providers\Wootled',
        'wordpress.tv' => '\Embera\Providers\WordpressTV',
        'yfrog.com' => '\Embera\Providers\YFrog',
        'yfrog.us' => '\Embera\Providers\YFrog',
        'youtu.be' => '\Embera\Providers\Youtube',
        'youtube.com' => '\Embera\Providers\Youtube',
    );

    /**
     * Construct
     *
     * @param array $config  Associative array with configuration options
     * @param object $oembed Instance of \Embera\Oembed
     * @return void
     */
    public function __construct(array $config = array(), \Embera\Oembed $oembed)
    {
        $this->config = array_replace_recursive(array(
            'params' => array(),
            'custom_params' => array(),
            'fake' => array()
        ), $config);

        $this->oembed = $oembed;
    }

    /**
     * Finds services for the given $urls.
     *
     * @param array $urls An array with all the available urls
     * @return array An Array with loaded services
     */
    protected function findServices(array $urls = array())
    {
        $return = array();
        $this->extractCustomParams($this->config['custom_params']);
        foreach (array_unique($urls) as $u) {

            try {
                $host = $this->getHost($u);
                if (isset($this->services[$host])) {
                    $provider = new \ReflectionClass($this->services[$host]);
                    $return[$u] = $provider->newInstance($u, $this->config, $this->oembed);

                    if (isset($this->customParams[$host])) {
                        $return[$u]->appendParams($this->customParams[$host]);
                    }
                }
            } catch (\Exception $e) {
                //echo $e->getMessage() . PHP_EOL;
            }
        }

        return $return;
    }

    /**
     * Adds a new Provider into the service map
     *
     * @param string $host The host for the map
     * @param string|object $class The class or object that should manage the provider
     * @param array $params Custom parameters that should be sent in the url for this Provider
     * @return void
     */
    public function addProvider($host, $class, array $params = array())
    {
        $host = preg_replace('~^(?:www)\.~i', '', strtolower($host));
        $this->services[$host] = $class;
        $this->customParams[$host] = $params;
    }

    /**
     * Gets a normalized host for the given $url
     *
     * @param string $url
     * @return string
     *
     * @throws InvalidArgumentException when the url seems to be invalid
     */
    protected function getHost($url)
    {
        $data = parse_url($url);
        if (empty($data['host'])) {
            throw new \InvalidArgumentException('The Url: ' . $url . ' seems to be invalid');
        }

        $host = preg_replace('~^(?:www|player)\.~i', '', strtolower($data['host']));
        if (isset($this->services[$host])) {
            return $host;
        } else if (isset($this->services['*.' . $host])) {
            return '*.' . $host;
        } else if (!empty($this->wildCardHosts)) {
            $trans = array('\*' => '(?:.*)');
            foreach ($this->wildCardHosts as $value) {
                $regex = strtr(preg_quote($value, '~'), $trans);
                if (preg_match('~' . $regex . '~i', $host)) {
                    return $value;
                }
            }
        }

        return $host;
    }

    /**
     * Extracts custom parameters for a Provider
     *
     * @param array $params
     * @return array
     */
    protected function extractCustomParams(array $params = array())
    {
        foreach ($params as $name => $values) {
            foreach ($this->services as $host => $service) {
                if (preg_match('~' . preg_quote($name, '~') . '~i', $service)) {
                    $this->customParams[$host] = (array) $values;
                }
            }
        }
    }

    /**
     * Returns an array with all valid services found.
     *
     * @param array|string $urls  An array with urls or a url string
     * @return array
     */
    public function getAll($urls)
    {
        $this->wildCardHosts = array_filter(array_keys($this->services), function($key) {
            return (strpos($key, '*') !== false);
        });

        return $this->findServices((array) $urls);
    }
}

?>

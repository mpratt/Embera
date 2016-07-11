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
        '23hq.com' => '\Embera\Providers\Hq23',
        'live.amcharts.com' => '\Embera\Providers\AmCharts',
        'animatron.com' => '\Embera\Providers\Animatron',
        'animoto.com' => '\Embera\Providers\Animoto',
        'on.aol.com' => '\Embera\Providers\AolOn',
        '5min.com' => '\Embera\Providers\AolOn',
        'alpha.app.net' => '\Embera\Providers\AppNet',
        'audiosnaps.com' => '\Embera\Providers\AudioSnaps',
        'photos.app.net' => '\Embera\Providers\AppNet',
        'bambuser.com' => '\Embera\Providers\Bambuser',
        '*.blip.tv' => '\Embera\Providers\BlipTV',
        'cacoo.com' => '\Embera\Providers\Cacoo',
        'public.chartblocks.com' => '\Embera\Providers\Chartblocks',
        'chirb.it' => '\Embera\Providers\Chirbit',
        'clipland.com' => '\Embera\Providers\Clipland',
        'clyp.it' => '\Embera\Providers\Clyp',
        'codepoints.net' => '\Embera\Providers\Codepoints',
        'circuitlab.com' => '\Embera\Providers\CircuitLab',
        'collegehumor.com' => '\Embera\Providers\CollegeHumor',
        'coub.com' => '\Embera\Providers\Coub',
        'crowdranking.com' => '\Embera\Providers\CrowdRanking',
        'c9ng.com' => '\Embera\Providers\CrowdRanking',
        'dailymile.com' => '\Embera\Providers\DailyMile',
        '*.dailymotion.com' => '\Embera\Providers\DailyMotion',
        'dai.ly' => '\Embera\Providers\DailyMotion',
        '*.deviantart.com' => '\Embera\Providers\Deviantart',
        'fav.me' => '\Embera\Providers\Deviantart',
        'sta.sh' => '\Embera\Providers\Deviantart',
        '*.didacte.com' => '\Embera\Providers\Didacte',
        'dipity.com' => '\Embera\Providers\Dipity',
        'dotsub.com' => '\Embera\Providers\DotSub',
        'edocr.com' => '\Embera\Providers\Edocr',
        'egliseinfo.catholique.fr' => '\Embera\Providers\EgliseInfo',
        'facebook.com' => '\Embera\Providers\Facebook',
        'flickr.com' => '\Embera\Providers\Flickr',
        'flic.kr' => '\Embera\Providers\Flickr',
        'funnyordie.com' => '\Embera\Providers\FunnyOrDie',
        'geograph.org.uk' => '\Embera\Providers\GeographUk',
        'geograph.co.uk' => '\Embera\Providers\GeographUk',
        'geograph.ie' => '\Embera\Providers\GeographUk',
        'geo.hlipp.de' => '\Embera\Providers\GeographDe',
        'geo-en.hlipp.de' => '\Embera\Providers\GeographDe',
        'germany.geograph.org' => '\Embera\Providers\GeographDe',
        'channel-islands.geographs.org' => '\Embera\Providers\GeographCI',
        'channel-islands.geograph.org' => '\Embera\Providers\GeographCI',
        'channel-islands.geographs.org.gg' => '\Embera\Providers\GeographCI',
        'channel-islands.geographs.org.je' => '\Embera\Providers\GeographCI',
        'gettyimages.com' => '\Embera\Providers\GettyImages',
        'gty.im' => '\Embera\Providers\GettyImages',
        'gfycat.com' => '\Embera\Providers\Gfycat',
        'gist.github.com' => '\Embera\Providers\GithubGist',
        'gmep.org' => '\Embera\Providers\Gmep',
        'huffduffer.com' => '\Embera\Providers\Huffduffer',
        'hulu.com' => '\Embera\Providers\Hulu',
        'ifixit.com' => '\Embera\Providers\IFixIt',
        'ifttt.com' => '\Embera\Providers\IFTTT',
        'infogr.am' => '\Embera\Providers\Infogram',
        'instagram.com' => '\Embera\Providers\Instagram',
        'instagr.am' => '\Embera\Providers\Instagram',
        'issuu.com' => '\Embera\Providers\Issuu',
        'kickstarter.com' => '\Embera\Providers\Kickstarter',
        'learningapps.org' => '\Embera\Providers\LearningApps',
        'meetup.com' => '\Embera\Providers\Meetup',
        'meetu.ps' => '\Embera\Providers\Meetup',
        'mixcloud.com' => '\Embera\Providers\MixCloud',
        'mobypicture.com' => '\Embera\Providers\MobyPicture',
        'moby.to' => '\Embera\Providers\MobyPicture',
        'nfb.ca' => '\Embera\Providers\NFB',
        'mix.office.com' => '\Embera\Providers\Officemix',
        'official.fm' => '\Embera\Providers\OfficialFM',
        'oumy.com' => '\Embera\Providers\Oumy',
        'pastery.net' => '\Embera\Providers\Pastery',
        '*.polldaddy.com' => '\Embera\Providers\PollDaddy',
        'polleverywhere.com' => '\Embera\Providers\PollEveryWhere',
        'portfolium.com' => '\Embera\Providers\Portfolium',
        'rapidengage.com' => '\Embera\Providers\Rapidengage',
        'rdio.com' => '\Embera\Providers\Rdio',
        'rd.io' => '\Embera\Providers\Rdio',
        'releasewire.com' => '\Embera\Providers\ReleaseWire',
        'rwire.com' => '\Embera\Providers\ReleaseWire',
        'repubhub.icopyright.net' => '\Embera\Providers\RepubHub',
        'reverbnation.com' => '\Embera\Providers\Reverbnation',
        'revision3.com' => '\Embera\Providers\Revision3',
        'roomshare.jp' => '\Embera\Providers\Roomshare',
        'rutube.ru' => '\Embera\Providers\Rutube',
        'videos.sapo.pt' => '\Embera\Providers\Sapo',
        'screenr.com' => '\Embera\Providers\Screenr',
        '*.scribd.com' => '\Embera\Providers\Scribd',
        'shortnote.jp' => '\Embera\Providers\ShortNote',
        '*.shoudio.com' => '\Embera\Providers\Shoudio',
        '*.shoud.io' => '\Embera\Providers\Shoudio',
        'showtheway.io' => '\Embera\Providers\Showtheway',
        '*.silk.co' => '\Embera\Providers\Silk',
        'sketchfab.com' => '\Embera\Providers\Sketchfab',
        '*.slideshare.net' => '\Embera\Providers\SlideShare',
        '*.soundcloud.com' => '\Embera\Providers\SoundCloud',
        'speakerdeck.com' => '\Embera\Providers\Speakerdeck',
        '*.spotify.com' => '\Embera\Providers\Spotify',
        'spoti.fi' => '\Embera\Providers\Spotify',
        'streamable.com' => '\Embera\Providers\Streamable',
        'content.streamonecloud.net' => '\Embera\Providers\StreamOneCloud',
        'sway.com' => '\Embera\Providers\Sway',
        'ted.com' => '\Embera\Providers\Ted',
        'theysaidso.com' => '\Embera\Providers\TheySaidSo',
        'twitter.com' => '\Embera\Providers\Twitter',
        'ustream.tv' => '\Embera\Providers\Ustream',
        'ustream.com' => '\Embera\Providers\Ustream',
        'verse.media' => '\Embera\Providers\Verse',
        'viddler.com' => '\Embera\Providers\Viddler',
        'videofork.com' => '\Embera\Providers\VideoFork',
        'videojug.com' => '\Embera\Providers\VideoJug',
        'vevo.com' => '\Embera\Providers\Vevo',
        'vimeo.com' => '\Embera\Providers\Vimeo',
        'wordpress.tv' => '\Embera\Providers\WordpressTV',
        'blog.wordpress.tv' => '\Embera\Providers\WordpressTV',
        'yfrog.com' => '\Embera\Providers\YFrog',
        'yfrog.us' => '\Embera\Providers\YFrog',
        'twitter.yfrog.com' => '\Embera\Providers\YFrog',
        'video.yandex.ru' => '\Embera\Providers\Yandex',
        'm.youtube.com' => '\Embera\Providers\Youtube',
        'youtube.com' => '\Embera\Providers\Youtube',
        'youtu.be' => '\Embera\Providers\Youtube',
        'vine.co' => '\Embera\Providers\Vine',
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

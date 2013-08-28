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

    /** @var array Custom parameters for each host/provider */
    protected $customParams = array();

    /** @var array Massive array with the mapping of host -> provider class relation. */
    protected $services = array(
        'youtube.com' => '\Embera\Providers\Youtube',
        'youtu.be' => '\Embera\Providers\Youtube',
        'vimeo.com' => '\Embera\Providers\Vimeo',
        'twitter.com' => '\Embera\Providers\Twitter',
        'instagram.com' => '\Embera\Providers\Instagram',
        'instagr.am' => '\Embera\Providers\Instagram',
        'soundcloud.com' => '\Embera\Providers\SoundCloud',
        'gist.github.com' => '\Embera\Providers\GithubGist',
        'qik.com' => '\Embera\Providers\Qik',
        'rdio.com' => '\Embera\Providers\Rdio',
        'rd.io' => '\Embera\Providers\Rdio',
        'revision3.com' => '\Embera\Providers\Revision3',
        'speakerdeck.com' => '\Embera\Providers\Speakerdeck',
        'dailymotion.com' => '\Embera\Providers\DailyMotion',
        'viddler.com' => '\Embera\Providers\Viddler',
        'mixcloud.com' => '\Embera\Providers\MixCloud',
        'flickr.com' => '\Embera\Providers\Flickr',
        'flic.kr' => '\Embera\Providers\Flickr',
        'hulu.com' => '\Embera\Providers\Hulu',
        'coub.com' => '\Embera\Providers\Coub',
        'screenr.com' => '\Embera\Providers\Screenr',
        'kickstarter.com' => '\Embera\Providers\Kickstarter',
        'circuitlab.com' => '\Embera\Providers\CircuitLab',
        'nfb.ca' => '\Embera\Providers\NFB',
        'dotsub.com' => '\Embera\Providers\DotSub',
        'scribd.com' => '\Embera\Providers\Scribd',
        'jest.com' => '\Embera\Providers\Jest',
        'alpha.app.net' => '\Embera\Providers\AppNet',
        'bambuser.com' => '\Embera\Providers\Bambuser',
        'videojug.com' => '\Embera\Providers\VideoJug',
        'photos.app.net' => '\Embera\Providers\AppNet',
        'my.opera.com' => '\Embera\Providers\MyOpera',
        'fav.me' => '\Embera\Providers\Deviantart',
        'sta.sh' => '\Embera\Providers\Deviantart',
        'collegehumor.com' => '\Embera\Providers\CollegeHumor',
        'animoto.com' => '\Embera\Providers\Animoto',
        'funnyordie.com' => '\Embera\Providers\FunnyOrDie',
        'ustream.tv' => '\Embera\Providers\Ustream',
        'ustream.com' => '\Embera\Providers\Ustream',
        'yfrog.com' => '\Embera\Providers\YFrog',
        'yfrog.us' => '\Embera\Providers\YFrog',
        'twitter.yfrog.com' => '\Embera\Providers\YFrog',
        'slideshare.net' => '\Embera\Providers\SlideShare',
        'clikthrough.com' => '\Embera\Providers\ClikThrough',
        'polleverywhere.com' => '\Embera\Providers\PollEveryWhere',
        'videos.sapo.pt' => '\Embera\Providers\Sapo',
        'on.aol.com' => '\Embera\Providers\AolOn',
        '5min.com' => '\Embera\Providers\AolOn',
        'ifixit.com' => '\Embera\Providers\IFixIt',
        'ted.com' => '\Embera\Providers\Ted',
        'chirb.it' => '\Embera\Providers\Chirbit',
        'wordpress.tv' => '\Embera\Providers\WordpressTV',
        'blog.wordpress.tv' => '\Embera\Providers\WordpressTV',
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
        '*.deviantart.com' => '\Embera\Providers\Deviantart',
        '*.polldaddy.com' => '\Embera\Providers\PollDaddy',
        '*.blip.tv' => '\Embera\Providers\BlipTV',
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
        $this->config = array_merge(array(
            'params' => array(),
            'custom_params' => array(),
        ), $config);

        $this->extractCustomParams($this->config['custom_params']);
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
        if (!empty($urls))
        {
            foreach (array_unique($urls) as $u)
            {
                try {
                    $host = $this->getHost($u);
                    if (isset($this->services[$host]))
                    {
                        $provider = new \ReflectionClass($this->services[$host]);
                        $return[$u] = $provider->newInstance($u, $this->config, $this->oembed);

                        if (isset($this->customParams[$host]))
                            $return[$u]->appendParams($this->customParams[$host]);
                    }
                } catch (\Exception $e) {
                    //echo $e->getMessage() . PHP_EOL;
                }
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
        if (empty($data['host']))
            throw new \InvalidArgumentException('The Url: ' . $url . ' seems to be invalid');

        $host = preg_replace('~^(?:www|player)\.~i', '', strtolower($data['host']));
        if (isset($this->services[$host]))
            return $host;
        else if (isset($this->services['*.' . $host]))
            return '*.' . $host;
        else
        {
            $wildcards = array_filter(array_keys($this->services), function($key){
                return (strpos($key, '*') !== false);
            });

            if (!empty($wildcards))
            {
                $trans = array('\*' => '(?:.*)');
                foreach ($wildcards as $value)
                {
                    $regex = strtr(preg_quote($value, '~'), $trans);
                    if (preg_match('~' . $regex . '~i', $host))
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
        if (!empty($params))
        {
            foreach ($params as $name => $values)
            {
                foreach ($this->services as $host => $service)
                {
                    if (preg_match('~' . $name . '~i', $service))
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
    public function getAll($urls) { return $this->findServices((array) $urls); }
}

?>

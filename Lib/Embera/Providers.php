<?php
/**
 * Providers.php
 *
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera;

class Providers
{
    protected $urls = array();
    protected $config = array();
    protected $services = array(
        'youtube.com' => 'Youtube',
        'youtu.be' => 'Youtube',
        'vimeo.com' => 'Vimeo',
        'qik.com' => 'Qik',
        'revision3.com' => 'Revision3',
        'dailymotion.com' => 'DailyMotion',
        'viddler.com' => 'Viddler',
        'flickr.com' => 'Flickr',
        'flic.kr' => 'Flickr'
    );

    /**
     * Construct
     *
     * @param array|string $urls  An array with urls or a url string
     * @param array $config       Associative array with configuration options
     * @param object $oembed      Instance of \Embera\Oembed
     * @return void
     */
    public function __construct($urls = array(), array $config = array(), \Embera\Oembed $oembed = null)
    {
        $this->oembed = $oembed;
        $this->config = $config;
        $this->findServices((array) $urls);
    }

    /**
     * Finds services for the given $urls.
     *
     * @param array $urls An array with all the available urls
     * @return void
     */
    protected function findServices(array $urls = array())
    {
        if (!empty($urls))
        {
            foreach (array_unique($urls) as $u)
            {
                try {
                    $host = $this->getHost($u);
                    if (isset($this->services[$host]))
                    {
                        $provider = new \ReflectionClass('\Embera\Providers\\' . $this->services[$host]);
                        $this->urls[$u] = $provider->newInstance($u, $this->config, $this->oembed);
                    }
                } catch (\Exception $e) {}
            }
        }
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

        return preg_replace('~^(?:www|player)\.~', '', strtolower($data['host']));
    }

    /**
     * Returns an array with all valid services found.
     *
     * @return array
     */
    public function getAll() { return $this->urls; }
}

?>

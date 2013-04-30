<?php
/**
 * Providers.php
 * This is class is used to map urls to services.
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
    protected $hosts = array('youtube.com' => 'Youtube');

    /**
     * Construct
     *
     * @param string|array $urls a string or array with urls
     * @return void
     */
    public function __construct($urls = array()) { $this->findServices((array) $urls); }

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
            foreach ($urls as $u)
            {
                try {
                    $urlObject = new \Embera\Url($this->normalize($u));
                    if (empty($this->urls[$u]) && isset($this->hosts[$urlObject->host]))
                    {
                        $provider = new \ReflectionClass('\Embera\Providers\\' . $this->hosts[$urlObject->host]);
                        $this->urls[$u] = $provider->newInstance($urlObject);
                    }
                } catch (\Exception $e) {}
            }
        }
    }

    /**
     * Tries to convert shortened urls to
     * its canonical equivalent.
     *
     * @param string $url
     * @return string
     */
    protected function normalize($url = null)
    {
        $translation = array('youtu.be/' => 'youtube.com/watch?v=');
        return str_ireplace(array_keys($translation), array_values($translation), $url);
    }

    /**
     * Returns an array with all valid services found.
     *
     * @return array
     */
    public function getAll() { return $this->urls; }
}

?>

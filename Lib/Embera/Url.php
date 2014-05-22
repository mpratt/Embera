<?php
/**
 * Url.php
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
 * This class is used to preform common/popular
 * tasks into a url string
 */
class Url
{
    /** @var string The url */
    protected $url;

    /** @var string Placeholder for the original url */
    protected $original;

    /**
     * Construct
     *
     * @param string $url A valid url string
     * @return void
     */
    public function __construct($url) { $this->url = $this->original = preg_replace('~^embed:~i', 'http:', $url); }

    /**
     * Returns the full url when
     * the object is casted into a string
     *
     * @return string
     */
    public function __toString() { return $this->url; }

    /**
     * Searches the url for a pattern $pattern.
     * If the pattern matches, the url is marked as invalid
     * and is emptied.
     *
     * @param string $pattern
     * @return void
     */
    public function invalidPattern($pattern)
    {
        if (preg_match('~' . $pattern . '~i', $this->url))
            $this->url = '';
    }

    /**
     * Overwrites the value of $this->url with
     * the given parameter.
     *
     * @param string $url
     * @return void
     */
    public function overwrite($url) { $this->url = $url; }

    /**
     * Discards changes made to a url, and goes back to the original
     * url.
     *
     * @return void
     */
    public function discardChanges() { $this->url = $this->original; }

    /**
     * Strips the query string from the url
     *
     * @return void
     */
    public function stripQueryString() { $this->url = preg_replace('~(\?|#)(.*)$~i', '', $this->url); }

    /**
     * Strips the / at the end of a url
     *
     * @return void
     */
    public function stripLastSlash() { $this->url = rtrim($this->url, '/'); }

    /**
     * Strips starting www from the url
     *
     * @return void
     */
    public function stripWWW() { $this->url = str_ireplace('://www.', '://', $this->url); }

    /**
     * Adds www. subdomain to the urls
     *
     * @return void
     */
    public function addWWW()
    {
        if (!preg_match('~^https?://www\.~i', $this->url))
            $this->url = str_ireplace('://', '://www.', $this->url);
    }

    /**
     * Replaces https protocol to http
     *
     * @return void
     */
    public function convertToHttp() { $this->url = str_ireplace('https://', 'http://', $this->url); }

    /**
     * Replaces http protocol to https
     *
     * @return void
     */
    public function convertToHttps() { $this->url = str_ireplace('http://', 'https://', $this->url); }
}

?>

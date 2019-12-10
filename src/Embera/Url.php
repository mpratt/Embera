<?php
/**
 * Url.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
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
    protected $originalUrl;

    protected $parts = [];

    /**
     * Construct
     *
     * @param string $url A valid url string
     * @return void
     */
    public function __construct($url)
    {
        $this->originalUrl = $url;
        $this->overwrite($url);
    }

    /**
     * Returns the full url when
     * the object is casted into a string
     *
     * @return string
     */
    public function __toString()
    {
        $url = [];
        if (!in_array(strtolower($this->parts['scheme']), ['http', 'https'])) {
            $this->parts['scheme'] = 'https';
        }

        $url[] = $this->parts['scheme'] . '://' . $this->parts['host'] . $this->parts['path'];
        if (!empty($this->parts['query'])) {
            $url[] = '?' . $this->parts['query'];
        }

        if (!empty($this->parts['fragment'])) {
            $url[] = '#' . $this->parts['fragment'];
        }

        return implode('', $url);
    }

    /**
     * Overwrites the value of $this->url with
     * the given parameter.
     *
     * @param string $url
     * @return void
     */
    public function overwrite($url)
    {
        $this->url = $url;
        $this->parts = array_merge([
            'scheme' => 'https',
            'host' => '',
            'path' => '',
            'query' => '',
            'fragment' => '',
        ], (array) parse_url($url));
    }

    /**
     * Discards changes made to a url, and goes back to the original
     * url.
     *
     * @return void
     */
    public function discardChanges()
    {
        $this->__construct($this->originalUrl);
    }

    /**
     * Change the host of the url
     *
     * @param string $host
     * @return void
     */
    public function setHost($host)
    {
        $this->parts['host'] = $host;
    }

    /**
     * Strips the query string from the url
     *
     * @return void
     */
    public function removeQueryString()
    {
        $this->parts['query'] = $this->parts['fragment'] = false;
    }

    /**
     * Strips the / at the end of a url
     *
     * @return void
     */
    public function removeLastSlash()
    {
        $this->parts['path'] = rtrim($this->parts['path'], '/');
    }

    /**
     * Strips starting www from the url
     *
     * @return void
     */
    public function removeWWW()
    {
        $this->parts['host'] = preg_replace('~^www\.~i', '', $this->parts['host']);
    }

    /**
     * Adds www. subdomain to the urls
     *
     * @return void
     */
    public function addWWW()
    {
        if (!preg_match('~^www\.~i', $this->parts['host'])) {
            $this->parts['host'] = 'www.' . $this->parts['host'];
        }
    }

    /**
     * Replaces https protocol to http
     *
     * @return void
     */
    public function convertToHttp()
    {
        $this->parts['scheme'] = 'http';
    }

    /**
     * Replaces http protocol to https
     *
     * @return void
     */
    public function convertToHttps()
    {
        $this->parts['scheme'] = 'https';
    }

}

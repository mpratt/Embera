<?php
/**
 * Flickr.php
 *
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Providers;

class Flickr extends \Embera\Adapters\Service
{
    protected $apiUrl = 'http://www.flickr.com/services/oembed?format=json';

    /**
     * Validates that the url belongs to this
     * service
     *
     * @return bool
     */
    protected function validateUrl()
    {
        return (preg_match('~/photos/(?:[^/]+)/(?:[0-9]+)/?~i', $this->url) || preg_match('~flic\.kr/p/(?:[^/]+)~i', $this->url));
    }

    /**
     * Normalizes a url.
     *
     * @return void
     */
    protected function normalizeUrl()
    {
        if (preg_match('~/photos/([^/"\'<>]+)/([0-9]+)/?~i', $this->url, $matches))
            $this->url = 'http://www.flickr.com/photos/' . $matches['1'] . '/' . $matches['2']. '/';
    }
}

?>

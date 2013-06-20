<?php
/**
 * Flickr.php
 *
 * @package Providers
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Providers;

/**
 * The Flickr.com Provider
 */
class Flickr extends \Embera\Adapters\Service
{

    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.flickr.com/services/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~/photos/(?:[^/]+)/(?:[0-9]+)/?~i', $this->url) || preg_match('~flic\.kr/p/(?:[^/]+)~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        if (preg_match('~/photos/([^/"\'<>]+)/([0-9]+)/?~i', $this->url, $matches))
            $this->url = 'http://www.flickr.com/photos/' . $matches['1'] . '/' . $matches['2']. '/';
    }
}

?>

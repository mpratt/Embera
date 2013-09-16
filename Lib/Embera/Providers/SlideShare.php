<?php
/**
 * SlideShare.php
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
 * The slideshare.net Provider
 * @link http://www.slideshare.net/developers/oembed
 * @link http://www.slideshare.net
 */
class SlideShare extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.slideshare.net/api/oembed/2?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        // urls with the about|newlist stuff in the middle dont work
        $this->url->invalidPattern('slideshare\.net/(?:about|newlist)/(?:[\w\d_-]+)/?$');

        return (preg_match('~slideshare\.net/(?:[\w\d_-]+)/(?:[\w\d_-]+)/?$~i', $this->url));
    }
}

?>

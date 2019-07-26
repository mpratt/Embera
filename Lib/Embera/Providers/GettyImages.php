<?php
/**
 * GettyImages.php
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
 * The gettyimages.com Provider
 *
 * @link https://www.gettyimages.com
 *
 * Supports:
 *  http://gty.im/a0200-000024
 *  http://www.gettyimages.com/detail/photo/dog-in-car-royalty-free-image/a0200-000024
 */
class GettyImages extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://embed.gettyimages.com/oembed?caller=embera';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~gty\.im/([a-z0-9\-]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        $this->url->stripWWW();
        $this->url->convertToHttp();
        $this->url->stripQueryString();
        $this->url->stripLastSlash();

        if (preg_match('~gettyimages\.com/detail/photo/(?:[^/]+)/([a-z0-9\-]+)$~i', $this->url, $matches)) {
            $this->url = new \Embera\Url('http://gty.im/' . $matches['1']);
        }
    }
}

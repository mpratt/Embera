<?php
/**
 * AppNet.php
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
 * The alpha|photos.app.net Provider
 * @link http://alpha.app.net
 * @link http://photos.app.net
 * @link http://developers.app.net/docs/other/oembed/
 */
class AppNet extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://alpha-api.app.net/oembed';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripLastSlash();

        return (preg_match('~alpha\.app\.net/(?:[^/]+)/(?:post)/(?:[0-9]+)~i', $this->url) ||
                preg_match('~photos\.app\.net/(?:[0-9]+)/([?:0-9]+)~i', $this->url));
    }
}

?>

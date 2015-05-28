<?php
/**
 * ReleaseWire.php
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
 * The releasewire.com Provider
 * TODO: This service could support offline responses
 */
class ReleaseWire extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://publisher.releasewire.com/oembed/';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~rwire\.com/(?:[0-9]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        $this->url->stripQueryString();
        $this->url->stripLastSlash();

        if (preg_match('~press-releases/release-([0-9]+)\.htm~i', $this->url, $matches)) {
            $this->url = new \Embera\Url('http://rwire.com/' . $matches[1]);
        }
    }
}

?>

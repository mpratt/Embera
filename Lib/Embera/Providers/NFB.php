<?php
/**
 * NFB.php
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
 * The nfb.ca Provider
 * @link http://www.nfb.ca
 */
class NFB extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.nfb.ca/remote/services/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();
        $this->url->stripLastSlash();

        return (preg_match('~/film/(?:[^/]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        $this->url->overwrite(preg_replace('~/embed/player$~i', '', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function modifyResponse(array $response = array())
    {
        if (!empty($response['html']))
        {
            // The html response comes "encoded" ... booooo :(, need to decode in order to work..
            // Bad API, bad bad bad!
            $response['html'] = html_entity_decode($response['html'], ENT_QUOTES, 'UTF-8');
            $response['html'] = preg_replace('~<p(.*)</p>~is', '', $response['html']);
        }

        return $response;
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        return array(
            'type' => 'video',
            'provider_name' => 'National Film Board of Canda',
            'provider_url' => 'http://www.nfb.ca',
            'html' => '<iframe src="' . $this->url . '/embed/player" width="{width}" height="{height}" ></iframe>',
        );
    }
}

?>

<?php
/**
 * Scribd.php
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
 * The scribd.com Provider
 * @link http://scribd.com
 */
class Scribd extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.scribd.com/services/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();

        return (preg_match('~scribd\.com/doc/(?:[0-9]+)/(?:[^/]+)/?$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function modifyResponse(array $response = array())
    {
        if (!empty($response['html']))
        {
            $response['html'] = str_replace('#{root_url}', 'http://www.scribd.com/', $response['html']);
            $response['html'] = preg_replace('~\s+~i', ' ', $response['html']); // Remove double spaces
        }

        return $response;
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~/doc/([\d]+)/~i', $this->url, $matches);

        return array(
            'type' => 'rich',
            'provider_name' => 'Scribd',
            'provider_url' => 'http://www.scribd.com',
            'html' => '<iframe class="scribd_iframe_embed" data-aspect-ratio="" frameborder="0" height="{height}" id="' . $matches['1'] . '" scrolling="no" src="http://www.scribd.com/embeds/' . $matches['1'] . '/content" width="100%"></iframe><script type="text/javascript">(function() { var scribd = document.createElement("script"); scribd.type = "text/javascript"; scribd.async = true; scribd.src = "http://www.scribd.com/javascripts/embed_code/inject.js"; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(scribd, s); })();</script>',
        );
    }
}

?>

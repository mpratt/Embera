<?php
/**
 * OfficialFM.php
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
 * The official.fm Provider
 * @link http://official.fm
 */
class OfficialFM extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://official.fm/services/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();
        $this->url->stripLastSlash();
        $this->url->stripWWW();

        return (preg_match('~official\.fm/(?:tracks|playlists)/(?:[^/]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function modifyResponse(array $response = array())
    {
        if (!empty($response['html']))
            $response['html'] = str_replace('\'', '"', $response['html']);

        return $response;
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~/(?:tracks|playlists)/([^/]+)$~i', $this->url, $matches);

        return array(
            'type' => 'rich',
            'provider_name' => 'Official.fm',
            'provider_url' => 'http://official.fm',
            'html' => '<iframe width="{width}" height="{height}" src="//official.fm/player?width={width}&height={height}&feed=%2F%2Fofficial.fm%2Ffeed%2Fplaylists%2F' . $matches['1'] . '.json" frameborder="0"></iframe>'
        );
    }
}

?>

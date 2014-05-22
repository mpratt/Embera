<?php
/**
 * AolOn.php
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
 * The on.aol.com Provider
 * @link http://on.aol.com
 */
class AolOn extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://on.aol.com/api';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->convertToHttp();
        $this->url->stripQueryString();
        $this->url->stripLastSlash();

        return (preg_match('~aol\.com/video/(?:[^/]+)-(?:[\d]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        if (preg_match('~5min\.com/video/(([^/]+)-([\d]+))~i', $this->url, $matches))
            $this->url = new \Embera\Url('http://on.aol.com/video/' . $matches['1']);
    }

    /** inline {@inheritdoc} */
    protected function modifyResponse(array $response = array())
    {
        if (!empty($response['html']))
        {
            $replace = array('<![CDATA[' => '', ']]>' => '', '\'' => '"');
            $response['html'] = str_ireplace(array_keys($replace), array_values($replace), $response['html']);
        }

        return $response;
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~([\d]+)$~i', $this->url, $matches);

        return array(
            'type' => 'video',
            'provider_name' => 'on.aol.com',
            'provider_url' => 'http://on.aol.com',
            'video_id' => $matches['1'],
            'html' => '<iframe width="{width}" height="{height}" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen src="http://embed.5min.com/PlayerSeed/?playList=' . $matches['1'] . '&autoStart=true"></iframe>',
        );
    }
}

?>

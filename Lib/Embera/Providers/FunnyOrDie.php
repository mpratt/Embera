<?php
/**
 * FunnyOrDie.php
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
 * The funnyordie.com Provider
 */
class FunnyOrDie extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.funnyordie.com/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();
        $this->url->stripLastSlash();

        return (preg_match('~funnyordie\.com/videos/(?:[\w\d]+)~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        if (preg_match('~\.com/embed/~i', $this->url))
            $this->url = new \Embera\Url(str_ireplace('/embed/', '/videos/', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function modifyResponse(array $response = array())
    {
        if (!empty($response['html']))
            $response['html'] = preg_replace('~<div(.*)</div>~is', '', trim($response['html']));

        return $response;
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~/videos/([\w\d]+)/?~', $this->url, $matches);
        return array(
            'type' => 'video',
            'provider_name' => 'Funny or Die',
            'provider_url' => 'http://www.funnyordie.com',
            'html' => '<iframe src="http://www.funnyordie.com/embed/' . $matches['1'] . '" width="{width}" height="{height}" frameborder="0" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe>',
        );
    }
}

?>

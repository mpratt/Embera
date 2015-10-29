<?php
/**
 * Rutube.php
 *
 * @package Providers
 * @author dotzero <mail@dotzero.ru>
 * @link   http://www.dotzero.ru/
 */

namespace Embera\Providers;

/**
 * The Rutube.ru Provider
 */
class Rutube extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://rutube.ru/api/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripWWW();
        $this->url->stripQueryString();

        return (preg_match('~\/video\/([a-z0-9]{25,})~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        $this->url->stripQueryString();

        if (preg_match('~\/video\/([a-z0-9]{25,})~i', $this->url, $matches)) {
            $this->url = new \Embera\Url('http://rutube.ru/video/' . $matches['1'] . '/');
        }
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~\/video\/([a-z0-9]{25,})~i', $this->url, $matches);

        return array(
            'type' => 'video',
            'provider_name' => 'Rutube',
            'provider_url' => 'http://rutube.ru',
            'title' => 'Unknown title',
            'html' => '<iframe src="//rutube.ru/video/embed/' . $matches['1'] . '" width="{width}" height="{height}" frameborder="0" title="" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>',
        );
    }
}

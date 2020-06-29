<?php

namespace Embera\Providers;

/**
 * The Acast Provider
 * @link https://www.Acast.com/fr
 */
class Acast extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://oembed.acast.com/v1/embed-player/';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripLastSlash();

        return (preg_match('~(play|embed).acast.com/[\w-]+/~i', $this->url));
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        return array(
            'version' => '1.0',
            'type' => 'rich',
            'provider_name' => 'Acast',
            'provider_url' => 'https://embed.acast.com',
            'html' => sprintf('<iframe src="%s" width="100%%" height="180px" scrolling="no" frameBorder="0" style="border:none;overflow:hidden;"></iframe>', $this->url)
        );
    }
}

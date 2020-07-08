<?php

namespace Embera\Providers;

/**
 * The Viously Provider
 * @link https://www.Viously.com/fr
 */
class Viously extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://www.viously.com/oembed';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~viously\.com/[\w-_]+/[\w-_]+$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~[^/]+$~i', $this->url, $matches);

        $id = $matches[0];

        return array(
            'version' => '1.0',
            'type' => 'video',
            'provider_name' => 'viously',
            'provider_url' => 'https://www.viously.com',
            'width' => '500',
            'height' => '282',
            'author_name' => '20MINUTES',
            'author_url' => 'https://www.viously.com/20minutes',
            'html' => sprintf('<div class=\"vsly-player\" data-height=\"9\" data-iframe=\"%s\" data-img=\"\" data-width=\"16\" id=\"%s"></div>', $this->url, $id)
        );
    }
}

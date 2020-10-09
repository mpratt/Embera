<?php

namespace Embera\Providers;

/**
 * The 20minutes Provider
 * @link https://splash.20minutes.fr
 */
class TwentyMinutes extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://splash.20minutes.fr/oembed';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~membre\.20minutes\.fr/newsletters/[\w-_]+~i', $this->url));
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~newsletters\/([\w_-]+)~i', $this->url, $section);
        preg_match('~&maxwidth=([\d]+)~i', $this->url, $maxWidth);
        preg_match('~&maxHeight=([\d]+)~i', $this->url, $maxHeight);

        $width = isset($maxWidth[1]) ? $maxWidth[1] : '600';
        $height = isset($maxHeight[1]) ? $maxHeight[1] : '400';

        return array(
            'version' => '1',
            'type' => 'rich',
            'title' => '20 Minutes',
            'author_name' => '20 Minutes',
            'author_url' => 'https://www.20minutes.fr',
            'provider_name' => '20 Minutes',
            'provider_url' => 'https://www.20minutes.fr',
            'thumbnail_url' => 'https://static.20mn.fr/logos/20minutes-blue.png',
            'thumbnail_width' => '512',
            'thumbnail_height' => '512',
            'width' => $width,
            'height' => $height,
            'html' => sprintf('<iframe width=\"%s\" height=\"%s\" src=\"%s\" frameborder=\"0\" ></iframe>', $width, $height, $this->url),
            'newsletterHtml' => sprintf('<div id="mbrs-newsletter-embed" class="mbrs" data-section="%s"></div>', $section[1]),
        );
    }
}

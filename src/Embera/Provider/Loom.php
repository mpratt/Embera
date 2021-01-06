<?php

/**
 * Loom.php
 *
 * @package Embera
 * @author Andrew Minion
 * @link   https://andrewrminion.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Provider;

use Embera\Url;

/**
 * loom.com Provider
 * @link https://www.loom.com
 */
class Loom extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritDoc} */
    protected $endpoint = 'https://www.loom.com/v1/oembed/';

    /** inline {@inheritDoc} */
    protected static $hosts = [
        'loom.com', 'www.loom.com',
    ];

    /** inline {@inheritdoc} */
    protected $allowedParams = [ 'maxwidth', 'maxheight' ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = false;

    /** inline {@inheritDoc} */
    public function validateUrl(Url $url)
    {
        return (bool) preg_match('~loom.com\/[share|embed]+\/([a-z0-9]+)~i', (string) $this->url);
    }

    /** inline {@inheritDoc} */
    public function normalizeUrl(Url $url)
    {
        if (preg_match('~loom.com\/embed\/([a-z0-9]+)~i', (string) $url, $matches)) {
            $url->overwrite('https://www.loom.com/share/' . $matches[1]);
        }

        return $url;
    }

    public function getFakeResponse()
    {
        preg_match('~loom.com\/share\/([a-z0-9]+)~i', (string) $this->url, $matches);
        $id = $matches[1];

        $embedUrl = 'https://www.loom.com/embed/'.$id;

        $attr = [
            'src="'.$embedUrl.'"',
            'frameborder="0"',
            'width="{width}"',
            'height="{height}"',
            'webkitallowfullscreen',
            'mozallowfullscreen',
            'allowfullscreen',
        ];

        return [
            'type' => 'video',
            'version' => '1.0',
            'html' => '<iframe '.implode(' ', $attr).'></iframe>',
            'title' => 'Untitled Video',
            'height' => 960,
            'width' => 1280,
            'provider_name' => 'Loom',
            'provider_url' => 'https://www.loom.com',
            'thumbnail_height' => 960,
            'thumbnail_width' => 1280,
            'thumbnail_url' => 'https://cdn.loom.com/sessions/thumbnails/'.$id.'-00001.png',
            'duration' => 0,
        ];
    }
}

<?php

namespace Embera\Providers;

/**
 * The Digiteka Provider
 * @link https://www.ultimedia.com
 */
class Digiteka extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://www.ultimedia.com/api/search/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripLastSlash();

        return (preg_match('~ultimedia\.com/(?:[^ ]+)/id/(?:[^ ]+)~i', $this->url));
    }
}

?>

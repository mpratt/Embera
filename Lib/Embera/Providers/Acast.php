<?php

namespace Embera\Providers;

/**
 * The Acast Provider
 * @link https://www.Acast.com/fr
 */
class Acast extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://embed.acast.com/';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripLastSlash();

        return (preg_match('/^https:\/\/embed.acast.com/', $this->url));
    }
}

?>

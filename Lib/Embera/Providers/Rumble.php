<?php
/**
 * Rumble.php
 *
 * @package Providers
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   https://rumble.com/
 */

namespace Embera\Providers;

/**
 * The Rumble Provider
 */
class Rumble extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://rumble.com/api/Media/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->convertToHttps();
        $this->url->stripWWW();
        $this->url->stripQueryString();

        return (preg_match('~/(?:[^ /]+)\.html$~i', $this->url));
    }
}

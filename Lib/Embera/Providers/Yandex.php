<?php
/**
 * Yandex.php
 *
 * @package Providers
 * @author dotzero <mail@dotzero.ru>
 * @link   http://www.dotzero.ru/
 */

namespace Embera\Providers;

/**
 * The Yandex.ru Provider
 */
class Yandex extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://video.yandex.ru/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();

        return (preg_match('~\/users\/([a-zA-Z0-9\_\.-]+)\/view\/([0-9]+)~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        $this->url->stripQueryString();

        if (preg_match('~\/users\/([a-zA-Z0-9\_\.-]+)\/view\/([0-9]+)~i', $this->url, $matches)) {
            $this->url = new \Embera\Url('https://video.yandex.ru/users/' . $matches['1'] . '/view/' . $matches['2'] . '/');
        }
    }
}

<?php
/**
 * Instagram.php
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
 * The instragram.com Provider
 * @link https://instagram.com
 */
class Instagram extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://api.instagram.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();
        return (
            preg_match('~/(?:p|tv)/([^/]+)/?$~i', $this->url) || preg_match('~/([^/]+)/(?:p|tv)/([^/]+)/?$~i', $this->url)
        );
    }
}

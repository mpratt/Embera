<?php
/**
 * Wordpress.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Provider;

use Embera\Url;

/**
 * Wordpress Provider
 * Create a free website or build a blog with ease on WordPress.com. Dozens of free, customizable,...
 *
 * @link https://wordpress.com
 *
 */
class Wordpress extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://public-api.wordpress.com/oembed/?format=json&for=embera';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.wordpress.com', 'wp.me'
    ];

    /** inline {@inheritdoc} */
    protected $allowedParams = [ 'maxwidth', 'maxheight', 'img_size', 'as_article' ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        // this needs to be as generic as ever...
        return (bool) (preg_match('~/([^/]+)~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();

        return $url;
    }

}

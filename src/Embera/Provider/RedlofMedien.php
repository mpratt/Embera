<?php
/**
 * RedlofMedien.php
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
 * RedlofMedien Provider
 *
 * @link https://redlof-medien.de
 */
class RedlofMedien extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://redlof-medien.de/wp-json/oembed/1.0/embed';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'redlof-medien.de',
        'showroom.redlof-medien.de',
        'show.wexcreator.com'
    ];

    /** inline {@inheritdoc} */
    protected $allowedParams = [ 'maxwidth', 'maxheight' ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = false;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~(redlof-medien\.de|show\.wexcreator\.com)/([^/]+)~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function getEndpoint()
    {
        if (preg_match('~(showroom\.redlof-medien\.de|show\.wexcreator\.com)/~i', (string) $this->url)) {
            $this->endpoint = 'https://api.wexcreator.com/oembed/';
        }

        return (string) $this->endpoint;
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();

        return $url;
    }
}

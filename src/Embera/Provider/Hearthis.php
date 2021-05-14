<?php
/**
 * Hearthis.php
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
 * Hearthis Provider
 * Stream your mixes, tracks and sounds on hearthis.at - lossless audio streaming and unlimited up...
 *
 * @link https://hearthis.at
 *
 */
class Hearthis extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://hearthis.at/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'hearthis.at'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~hearthis\.at/(?:[^/]+)/(?:[^/]+)/?$~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();

        return $url;
    }

}

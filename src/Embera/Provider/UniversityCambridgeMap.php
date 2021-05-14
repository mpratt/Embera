<?php
/**
 * UniversityCambridgeMap.php
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
 * UniversityCambridgeMap Provider
 * University of Cambridge map and directory
 *
 * @link https://map.cam.ac.uk
 *
 */
class UniversityCambridgeMap extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://map.cam.ac.uk/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'map.cam.ac.uk'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~map\.cam\.ac\.uk/([^/]+)~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();
        $url->removeLastSlash();

        return $url;
    }

}

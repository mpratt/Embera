<?php
/**
 * Digiteka.php
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
 * Digiteka Provider
 * The Digiteka Smart Video Player automatically displays
 * contextually relevant video on every article
 *
 * @link https://digiteka.com/
 */
class Digiteka extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.ultimedia.com/api/search/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'ultimedia.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~ultimedia\.com/(central|default)/(video|index)/(edit|videogeneric/id)/([^/]+)/?~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->addWWW();
        $url->convertToHttps();
        $url->removeQueryString();

        return $url;
    }

}

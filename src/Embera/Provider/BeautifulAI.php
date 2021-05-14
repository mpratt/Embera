<?php
/**
 * BeautifulAI.php
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
 * BeautifulAI Provider
 * It’s an expert deck designer. Make your business look brilliant, keep your team forever on brand,
 * and save hours on pitches you’re actually proud of.
 *
 * @link https://beautiful.ai
 * @todo It seems as it could support fake responses but we dont have enough data to test.
 *
 */
class BeautifulAI extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.beautiful.ai/api/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'beautiful.ai'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~beautiful\.ai/deck/(?:[^/]+)/(?:[^/]+)/?$~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();
        return $url;
    }
}

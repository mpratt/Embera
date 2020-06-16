<?php
/**
 * Zeplin.php
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
 * Zeplin Provider
 * @link https://app.zeplin.io
 */
class Zeplin extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://app.zeplin.io/embed';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'app.zeplin.io'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (
            preg_match('~zeplin\.io/project/([^/]+)/(screen|styleguide)/~i', (string) $url) ||
            preg_match('~zeplin\.io/styleguide/([^/]+)/components~i', (string) $url)
        );
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        return $url;
    }

}

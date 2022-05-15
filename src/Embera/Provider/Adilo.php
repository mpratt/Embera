<?php
/**
 * Adilo.php
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
 * Adilo Provider
 *
 * @link https://adilo.bigcommand.com
 */
class Adilo extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://adilo.bigcommand.com/web/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'adilo.bigcommand.com'
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
        return (bool) (preg_match('~bigcommand\.com/watch/([^/]+)~i', (string) $url));
    }
}

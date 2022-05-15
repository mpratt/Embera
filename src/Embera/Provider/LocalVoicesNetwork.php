<?php
/**
 * LocalVoicesNetwork.php
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
 * LocalVoicesNetwork Provider
 *
 * @link https://lvn.org
 * @see https://embed.dev.lvn.org/oembed/
 */
class LocalVoicesNetwork extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://embed.lvn.org/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.lvn.org'
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
        return (bool) (preg_match('~hid=([a-z0-9]+)~i', (string) $url));
    }
}

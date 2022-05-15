<?php
/**
 * Bumper.php
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
 * Bumper Provider
 *
 * @link https://bumper.com
 */
class Bumper extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.bumper.com/oembed-s/bumper?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'bumper.com'
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
        return (bool) (preg_match('~bumper\.com/(marketplace\-s|oembed|oembed\-s)/([^/]+)~i', (string) $url));
    }
}

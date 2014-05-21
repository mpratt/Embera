<?php
/**
 * Animoto.php
 *
 * @package Providers
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Providers;

/**
 * The animoto.com Provider
 * @link http://animoto.com
 * @link http://help.animoto.com/entries/109992-oEmbed-API
 *
 * @todo It could be posible to give offline support for this service
 * but the query string inside the iframe src requires a parameter named 'r'
 * which must be valid, and there is no way to determine it from the url.
 */
class Animoto extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://animoto.com/oembeds/create?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~/play/(?:[\w\d]+)/?$~i', $this->url));
    }
}

?>

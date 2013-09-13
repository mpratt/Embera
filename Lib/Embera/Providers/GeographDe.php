<?php
/**
 * GeographDe.php
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
 * The hlipp.de Provider
 * @link http://hlipp.de
 *
 * @todo This Service doesnt provide an html key on response its not possible to generate one from the url alone.
 */
class GeographDe extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://geo.hlipp.de/restapi.php/api/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~/photo/(?:[0-9]+)/?$~i', $this->url));
    }
}

?>

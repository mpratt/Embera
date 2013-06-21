<?php
/**
 * MyOpera.php
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
 * The my.opera.com Provider
 */
class MyOpera extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://my.opera.com/service/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        // TODO: Strip noise from the querystring
        return (preg_match('~my\.opera\.com/([^/]+)/(avatar\.pl|(albums/(show|showpic)\.dml\?(id|album)=))~i', $this->url));
    }
}

?>

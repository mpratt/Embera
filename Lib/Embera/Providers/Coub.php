<?php
/**
 * Coub.php
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
 * The coub.com Provider
 */
class Coub extends \Embera\Adapters\Service
{

    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://coub.com/api/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~coub\.com/(?:view|embed)/(?:[\w\d]+)/?$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        $this->url = preg_replace('~\?(.*)$~i', '', $this->url);
        if (preg_match('~//www\.coub.com~i', $this->url))
            $this->url = str_ireplace('//www.coub.com', '//coub.com', $this->url);
    }
}

?>

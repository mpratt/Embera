<?php
/**
 * Urtak.php
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
 * The urtak.com Provider
 * @link http://oembed.urtak.com/
 * @link http://urtak.com
 */
class Urtak extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://oembed.urtak.com/1/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~urtak\.com/(?:u|clr)/(?:[^/]+)/?$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function modifyResponse(array $response = array())
    {
        if (empty($response['html']))
            $response['html'] = '<a href="' . $response['url'] . '" target="_blank">' . htmlspecialchars($response['title'], ENT_QUOTES, 'UTF-8') . '</a>';

        return $response;
    }
}

?>

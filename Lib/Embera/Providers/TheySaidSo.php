<?php
/**
 * TheySaidSo.php
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
 * The TheySaidSo.com Provider
 * @link https://theysaidso.com
 */
class TheySaidSo extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://theysaidso.com/extensions/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();
        $this->url->stripLastSlash();
        $this->url->stripWWW();
        $this->url->convertToHttps();

        return (preg_match('~theysaidso\.com/(?:i|quote)/(?:[^/]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function modifyResponse(array $response = array())
    {
        if (empty($response['html'])) {
            if ($response['type'] == 'photo') {
                $response['html'] = sprintf('<img src="%s" alt="" title="" class="embera-img-theysaidso" />', $response['url']);
            } else {
                $response['html'] = sprintf('<a href="%s" class="embera-link-theysaidso" title="">%s</a>', $response['url'], $response['url']);
            }
        }

        return $response;
    }
}
?>

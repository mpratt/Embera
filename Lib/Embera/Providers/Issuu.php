<?php
/**
 * Issuu.php
 *
 * @package Providers
 * @author Rob Taylor <rob@uxblondon.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Providers;

/**
 * The issuu.com Provider
 * @link https://issuu.com
 */
class Issuu extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://issuu.com/oembed_wp';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~https?://(www\.)?issuu\.com/.+/docs/.+~i', $this->url));
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        $queryString = parse_url($this->url, PHP_URL_QUERY);
        parse_str($queryString, $q);

        if (isset($q['e']) && preg_match('~^(?:[a-z0-9\/]+)$~i', $q['e'])) {
            $html = '<div data-configid="' . $q['e'] . '"  style="width: {width}px; height: {height}px" class="issuuembed"></div>';
            $html .= '<script type="text/javascript" src="//e.issuu.com/embed.js" async="true"></script>';

            return array(
                'type' => 'rich',
                'provider_name' => 'Issuu',
                'provider_url' => 'https://issuu.com',
                'html' => $html
            );
        }
    }
}

?>

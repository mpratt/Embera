<?php
/**
 * Officemix.php
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
 * The Officemix Provider
 * @link https://mix.office.com
 */
class Officemix extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://mix.office.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();
        $this->url->stripLastSlash();
        $this->url->convertToHttps();

        return (preg_match('~mix\.office\.com/(?:watch|embed)/(?:[^/]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~/(?:watch|embed)/([^/]+)$~i', $this->url, $m);

        return array(
            'type' => 'rich',
            'provider_name' => 'Officemix',
            'provider_url' => 'https://mix.office.com',
            'html' => '<iframe width="{width}" height="{height}" src="https://mix.office.com/embed/' . $m['1'] . '" title="" frameborder="0" allowfullscreen></iframe>',
        );
    }
}

?>

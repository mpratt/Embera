<?php
/**
 * AmCharts.php
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
 * The AmCharts Live Charts  Provider
 * @link http://live.amcharts.com
 */
class AmCharts extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://live.amcharts.com/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->invalidPattern('amcharts\.com/new');
        return (preg_match('~live\.amcharts\.com/([^ /]+)/?$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        $this->url->stripQueryString();
        $this->url->convertToHttp();

        if (preg_match('~amcharts\.com/([^ /]+)(/edit/?)?~i', $this->url, $matches)) {
            $this->url = new \Embera\Url('http://live.amcharts.com/' . $matches['1'] . '/');
        }
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~amcharts\.com/([^ /]+)~i', $this->url, $matches);
        $url = 'http://live.amcharts.com/' . $matches['1'];

        return array(
            'type' => 'rich',
            'provider_name' => 'amCharts',
            'provider_url' => 'http://www.amcharts.com/',
            'thumbnail_url' => 'http://generated.amcharts.com/' . substr($matches['1'], 0, 2) . '/' . $matches['1'] . '-full.png',
            'thumbnail_width' => 404,
            'thumbnail_height' => 300,
            'canonical' => $url . '/',
            'html' => '<iframe width="{width}" height="{height}" src="' . $url . '/embed/" frameborder="0"></iframe>',
        );
    }
}

?>

<?php
/**
 * Chartblocks.php
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
 * The chartblocks.com Provider
 */
class Chartblocks extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://embed.chartblocks.com/1.0/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->convertToHttp();
        return (preg_match('~chartblocks\.com/c/([^ ]+)/?$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~chartblocks\.com/c/([0-9A-z]+)~i', $this->url, $m);

        return array(
            'type' => 'rich',
            'provider_name' => 'ChartBlocks',
            'provider_url' => 'http://www.chartblocks.com',
            'title' => 'Unknown title',
            'thumbnail_url' => 'https://d3ugvbs94d921r.cloudfront.net/' . $m['1'] . '.png',
            'html' => '<iframe class="chartblocks-embed" src="//embed.chartblocks.com/1.0/?c=' . $m['1'] . '" height="{height}" width="{width}" frameborder="0"></iframe>',
        );
    }
}

?>

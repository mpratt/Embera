<?php
/**
 * CircuitLab.php
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
 * The circuitlab.com Provider
 * @link https://www.circuitlab.com
 */
class CircuitLab extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://www.circuitlab.com/circuit/oembed/';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->addWWW();
        $this->url->convertToHttps();
        $this->url->stripQueryString();

        return (preg_match('~circuitlab\.com/circuit/(?:[\w\d]+)/(?:[^/]*)/?$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        if (preg_match('~circuitlab\.com/c([\w\d]+)/?$~i', $this->url, $matches)) {
            $this->url = new \Embera\Url('https://www.circuitlab.com/circuit/' . $matches['1'] . '/');
        }
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~circuitlab\.com/circuit/([\w\d]+)/~i', $this->url, $matches);

        return array(
            'type' => 'rich',
            'provider_name' => 'CircuitLab',
            'provider_url' => 'https://www.circuitlab.com/',
            'html' => '<iframe src="https://www.circuitlab.com/circuit/' . $matches['1'] . '/embed_target/?width={width}" scrolling="no" frameborder="0" width="{width}" height="{height}"></iframe>',
        );
    }
}

?>

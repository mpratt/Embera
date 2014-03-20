<?php
/**
 * AudioSnaps.php
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
 * The audiosnaps.com Provider
 * @link http://audiosnaps.com
 */
class AudioSnaps extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://audiosnaps.com/service/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~audiosnaps\.com/k/(?:[^/]+)/$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        if (preg_match('~audiosnaps\.com/k/([^/]+)$~i', $this->url, $matches)) {
            $this->url = new \Embera\Url('http://audiosnaps.com/k/' . $matches[1] . '/');
        }
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~audiosnaps\.com/k/([^/]+)/?$~i', $this->url, $matches);
        $id = $matches['1'];

        return array(
            'type' => 'rich',
            'provider_name' => 'AudioSnaps',
            'provider_url' => 'http://audiosnaps.com',
            'html' => '<iframe width="{width}" height="{height}" src="http://audiosnaps.com/i/embed/' . $id . '/?framed=1" frameborder="0" ></iframe>',
        );
    }
}

?>

<?php
/**
 * Youtube.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Provider;

use Embera\Url;

/**
 * youtube.com Provider
 * @link https://youtube-eng.googleblog.com/2009/10/oembed-support_9.html
 */
class Youtube extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.youtube.com/oembed?format=json&scheme=https';

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~v=(?:[a-z0-9_\-]+)~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        if (preg_match('~(?:v=|youtu\.be/|youtube\.com/embed/)([a-z0-9_\-]+)~i', (string) $this->url, $matches)) {
            $url->overwrite('https://www.youtube.com/watch?v=' . $matches[1]);
        }

        return $url;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        preg_match('~v=([a-z0-9_\-]+)~i', (string) $this->url, $matches);

        return array(
            'type' => 'video',
            'provider_name' => 'Youtube',
            'provider_url' => 'https://www.youtube.com',
            'title' => 'Unknown title',
            'html' => '<iframe width="{width}" height="{height}" src="//www.youtube.com/embed/' . $matches['1'] . '" frameborder="0" allowfullscreen></iframe>',
        );
    }

}

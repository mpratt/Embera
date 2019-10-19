<?php
/**
 * Ustream.php
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
 * The ustream.tv|com Provider
 * @link http://ustream.tv
 */
class Ustream extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.ustream.tv/oembed';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripLastSlash();
        $this->url->invalidPattern('ustream\.(?:com|tv)/(?:explore|howto|upcomming|our-company|services|premium-membership|search)$');

        return (preg_match('~ustream\.(?:com|tv)/channel/(?:[\w\d\-_]+)$~i', $this->url) ||
                preg_match('~ustream\.(?:com|tv)/recorded/(?:[\w\d\-_]+)$~i', $this->url) ||
                preg_match('~ustream\.(?:com|tv)/(?:[\w\d\-_]+)$~i', $this->url));
    }
}

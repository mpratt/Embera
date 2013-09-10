<?php
/**
 * DotSub.php
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
 * The dotsub.com Provider
 * @link http://dotsub.com/solutions/oEmbed
 * TODO: This service might support fake responses
 */
class DotSub extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://dotsub.com/services/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripLastSlash();

        return (preg_match('~dotsub\.com/view/(?:[a-f0-9]+)-(?:[a-f0-9]+)-(?:[a-f0-9]+)-(?:[a-f0-9]+)-(?:[a-f0-9]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        if (preg_match('~/media/([0-9a-f\-]+)~i', $this->url, $matches))
            $this->url = new \Embera\Url('http://dotsub.com/view/' . $matches['1']);
    }
}

?>

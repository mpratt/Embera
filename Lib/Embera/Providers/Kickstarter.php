<?php
/**
 * Kickstarter.php
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
 * The kickstarter.com Provider
 */
class Kickstarter extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.kickstarter.com/services/oembed';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~/projects/(?:[^/]+)/(?:[^/]+)/?$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        $this->url = preg_replace('~\?(.*)$~i', '', $this->url);
        if (!preg_match('~https?://www\.~i', $this->url))
            $this->url = str_ireplace('//kickstarter.com', '//www.kickstarter.com', $this->url);
    }
}

?>

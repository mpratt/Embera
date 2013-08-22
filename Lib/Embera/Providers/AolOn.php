<?php
/**
 * AolOn.php
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
 * The on.aol.com Provider
 */
class AolOn extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://on.aol.com/api';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~aol\.com/video/(?:[^/]+)-(?:[\d]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        $this->url = preg_replace('~\?(.*)$~i', '', $this->url);
        if (preg_match('~5min\.com/video/([^/]+)$~i', $this->url, $matches))
            $this->url = 'http://on.aol.com/video/' . $matches['1'];
    }
}

?>

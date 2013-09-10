<?php
/**
 * CrowdRanking.php
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
 * The crowdranking.com Provider
 */
class CrowdRanking extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://crowdranking.com/api/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripWWW();

        return (preg_match('~crowdranking\.com/(?:crowdrankings|rankings|topics|widgets|r)/(?:[^/]+)/?$~i', $this->url));
    }

}

?>

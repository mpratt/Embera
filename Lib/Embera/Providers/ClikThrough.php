<?php
/**
 * ClikThrough.php
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
 * The clikthrough.com Provider
 * TODO: Candidate for fake support
 */
class ClikThrough extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://clikthrough.com/services/oembed';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~clikthrough\.com/theater/video/([0-9]+)/?~i', $this->url));
    }
}

?>

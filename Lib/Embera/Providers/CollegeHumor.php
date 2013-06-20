<?php
/**
 * CollegeHumor.php
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
 * The CollegeHumor.com Provider
 */
class CollegeHumor extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.collegehumor.com/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~collegehumor\.com/(?:video|embed)/(?:[0-9]{5,10})/?~i', $this->url));
    }
}

?>

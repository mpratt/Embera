<?php
/**
 * Qik.php
 *
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Providers;

class Qik extends \Embera\Adapters\Service
{
    protected $apiUrl = 'http://qik.com/api/oembed.json';

    /**
     * Validates that the url belongs to this
     * service
     *
     * @return bool
     */
    protected function validateUrl()
    {
        return (preg_match('~qik\.com/video/(?:[0-9]+)/?$~i', $this->url));
    }
}

?>

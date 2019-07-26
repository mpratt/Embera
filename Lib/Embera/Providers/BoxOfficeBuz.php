<?php
/**
 * BoxOfficeBuz.php
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
 * The BoxOfficeBuz Provider
 */
class BoxOfficeBuz extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = '';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->convertToHttps();
        return (preg_match('~/video/(?:[^ ]+)~i', $this->url));
    }
}


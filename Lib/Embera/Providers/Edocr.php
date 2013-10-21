<?php
/**
 * Edocr.php
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
 * The edocr.com Provider
 * @link http://www.edocr.com/
 * @link http://www.edocr.com/oembed-documentation
 */
class Edocr extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.edocr.com/api/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();
        $this->url->stripLastSlash();
        $this->url->addWWW();

        return (preg_match('~edocr\.com/doc/(?:[0-9]+)/(?:[^/]+)$~i', $this->url));
    }
}

?>

<?php
/**
 * StreamOneCloud.php
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
 * The StreamOneCloud Provider
 * @link https://streamone.nl/
 * @link https://streamonecloud.net/
 */
class StreamOneCloud extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://content.streamonecloud.net/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->convertToHttps();
        return (preg_match('~streamonecloud\.net/embed/(?:[^ ]+)$~i', $this->url));
    }
}

?>

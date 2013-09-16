<?php
/**
 * Roomshare.php
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
 * The roomshare.jp Provider
 * @link http://roomshare.jp
 */
class Roomshare extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://roomshare.jp/en/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();

        return (preg_match('~roomshare\.jp/post/(?:[0-9]+)/?$~i', $this->url) ||
                preg_match('~roomshare\.jp/(?:[^/]+)/post/(?:[0-9]+)/?$~i', $this->url)  );
    }
}

?>

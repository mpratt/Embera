<?php
/**
 * Screencast.php
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
 * The screencast.com Provider
 * @link http://www.screencast.com
 */
class Screencast extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = '';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->convertToHttps();
        $this->url->addWWW();

        return (preg_match('~/(?:t|users)/(?:[^ ]+)~i', $this->url));
    }
}

?>

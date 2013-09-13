<?php
/**
 * JustinTV.php
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
 * The Justin.tv Provider
 * @link http://justin.tv
 */
class JustinTV extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://api.justin.tv/api/embed/from_url.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripLastSlash();
        $this->url->addWWW();

        return (preg_match('~justin\.tv/(?:[\w\d_\-]+)$~i', $this->url));
    }
}

?>

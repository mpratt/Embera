<?php
/**
 * EgliseInfo.php
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
 * The EgliseInfo Provider
 * @link http://egliseinfo.catholique.fr/
 */
class EgliseInfo extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://egliseinfo.catholique.fr/api/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~egliseinfo\.catholique\.fr/([^ ]+)~i', $this->url));
    }
}

?>

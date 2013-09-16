<?php
/**
 * Revision3.php
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
 * The Revision3.com Provider
 * @link http://revision3.com
 */
class Revision3 extends \Embera\Adapters\Service
{

    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://revision3.com/api/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->invalidPattern('revision3\.com/(?:network|host|advertise)/');

        return (preg_match('~revision3\.com/([^/]+)/([^/]+)/?~i', $this->url));
    }
}

?>

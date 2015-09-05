<?php
/**
 * Reverbnation.php
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
 * The reverbnation.com Provider
 * @link https://www.reverbnation.com
 */
class Reverbnation extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://www.reverbnation.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();
        $this->url->stripLastSlash();
        $this->url->convertToHttps();

        $banned = array(
            'band-promotion',
            'signup',
            'pricing',
            'connect',
            'termsandconditions',
            'termsandconditions',
            'privacy',
            'copyright',
            'trademark',
            'refund',
            'abuse',
            'developers',
            'band-promotion',
            'industryprofessionals',
            'fan-promotion',
            'venue-promotion',
        );

        $this->url->invalidPattern('(?:\.com/(' . implode('|', $banned) . '))$');

        return (
            preg_match('~\.com/(?:[^ /]+)$~i', $this->url) ||
            preg_match('~\.com/(?:[^ /]+)/songs?/(?:[^ /]+)$~i', $this->url)
        );
    }
}

?>

<?php
/**
 * Meetup.php
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
 * The meetup.com Provider
 * @link http://www.meetup.com/meetup_api/docs/oembed/
 * @link http://www.meetup.com
 */
class Meetup extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://api.meetup.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();

        return (preg_match('~meetup\.com/(?:.+)~i', $this->url) ||
                preg_match('~meetu\.ps/(?:[\w\d]+)/?$~i', $this->url)  );
    }
}

?>

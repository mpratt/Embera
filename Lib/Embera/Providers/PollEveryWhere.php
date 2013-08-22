<?php
/**
 * PollEveryWhere.php
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
 * The polleverywhere.com Provider
 * TODO: Candidate for fake support
 */
class PollEveryWhere extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.polleverywhere.com/services/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~polleverywhere\.com/(?:polls|free_text_polls|multiple_choice_polls)/(?:[\w\d]+)/?$~i', $this->url));
    }
}

?>

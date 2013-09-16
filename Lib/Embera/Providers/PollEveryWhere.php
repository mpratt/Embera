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
 * @link http://polleverywhere.com
 */
class PollEveryWhere extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.polleverywhere.com/services/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->addWWW();

        return (preg_match('~polleverywhere\.com/(?:polls|free_text_polls|multiple_choice_polls)/(?:[\w\d]+)/?$~i', $this->url));
    }

    /**
     * The html code from polleverywhere doesnt work
    public function fakeResponse()
    {
        $this->url->stripQueryString();
        $this->url->stripLastSlash();

        return array(
            'type' => 'rich',
            'provider_name' => 'Poll Everywhere',
            'provider_url' => 'http://www.polleverywhere.com',
            'html' => '<script language="javascript" src="' . $this->url . '/web.js?results_count_format=percent" type="text/javascript"></script>'
        );
    } */
}

?>

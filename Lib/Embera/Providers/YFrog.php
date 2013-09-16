<?php
/**
 * YFrog.php
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
 * The yfrog.com|yfrog.us Provider
 * @link http://yfrog.com
 */
class YFrog extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.yfrog.com/api/oembed';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();
        $this->url->stripLastSlash();

        return (preg_match('~yfrog\.(?:com|us)/([\w\d]{7,})$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function modifyResponse(array $response = array())
    {
        if (empty($response['html']))
            $response['html'] = '<a href="' . $this->url . '" target="_blank"><img class="yfrog-oembed" src="' . $response['thumbnail_url'] . '" alt=""></a>';

        return $response;
    }
}

?>

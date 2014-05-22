<?php
/**
 * PollDaddy.php
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
 * The polldaddy.com Provider
 * @link http://support.polldaddy.com/oembed/
 * @link http://polldaddy.com
 *
 * TODO: This provider should be able to provide fake responses,
 * but there are cases when it is not possible, so the code is commented
 * out.
 */
class PollDaddy extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://polldaddy.com/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->convertToHttp();
        $this->url->stripWWW();

        return (preg_match('~polldaddy\.com/(?:poll|s|ratings)/(?:[^/]+)/?$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function modifyResponse(array $response = array())
    {
        if (!empty($response['html'])) {
            $response['html'] = preg_replace('~<noscript>(.*)</noscript>~is', '', $response['html']);
        }

        return $response;
    }

    /** inline {@inheritdoc} */
    /*
    public function fakeResponse()
    {
        if (preg_match('~/poll/([\d]+)/?$~i', $this->url, $matches))
        {
            return array(
                'type' => 'rich',
                'provider_name' => 'Polldaddy',
                'provider_url' => 'http://polldaddy.com',
                'html' => '<script type="text/javascript" charset="utf-8" src="http://static.polldaddy.com/p/' . $matches['1'] . '.js"></script>'
            );
        }

        return array();
    } */
}

?>

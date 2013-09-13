<?php
/**
 * GithubGist.php
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
 * The gist.github.com Provider
 * @link https://gist.github.com
 */
class GithubGist extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://github.com/api/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();
        $this->url->stripLastSlash();

        return (preg_match('~/(?:[\d]+)$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        if (preg_match('~github\.com/(?:[^/]+)/([\d]+)/?~i', $this->url, $matches))
            $this->url->overwrite('https://gist.github.com/' . $matches['1']);
    }

    /** inline {@inheritdoc} */
    protected function modifyResponse(array $response = array())
    {
        $this->url->discardChanges();
        if (preg_match('~github\.com/([^/]+)/([\d]+)~i', $this->url, $matches))
            $response['html'] = '<script type="text/javascript" src="https://gist.github.com/' . $matches['1'] . '/' . $matches['2'] . '.js"></script>';

        return $response;
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        $this->url->discardChanges();
        if (preg_match('~github\.com/([^/]+)/([\d]+)~i', $this->url, $matches))
        {
            return array(
                'type' => 'rich',
                'provider_name' => 'GitHub',
                'provider_url'  => 'https://github.com',
                'html' => '<script type="text/javascript" src="https://gist.github.com/' . $matches['1'] . '/' . $matches['2'] . '.js"></script>',
                'title' => 'gist:' . $matches['2']
            );
        }

        return array();
    }
}

?>

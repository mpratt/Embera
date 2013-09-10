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
 */
class GithubGist extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://github.com/api/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripQueryString();

        return (preg_match('~(?:[\d]+)/?$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        if (preg_match('~github\.com/(?:[\w\d_\-\.]+)/([\d]+)/?~i', $this->url, $matches))
            $this->url = new \Embera\Url('https://gist.github.com/' . $matches['1']);
    }

}

?>

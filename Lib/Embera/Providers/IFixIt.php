<?php
/**
 * IFixIt.php
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
 * The ifixit.com Provider
 * @link http://www.ifixit.com/api/doc/embed
 * @link http://www.ifixit.com/
 */
class IFixIt extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.ifixit.com/Embed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~ifixit\.com/(?:Guide|Teardown)/(?:[\w\d\+ %]+)/(?:[\d/]+)/?$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~/(\d{4,20})/?~i', $this->url, $matches);
        return array(
            'type' => 'rich',
            'provider_name' => 'iFixit',
            'provider_url' => 'http://www.ifixit.com',
            'html' => '<iframe src="https://www.ifixit.com/Guide/Embed/'.$matches[1].'" width="1000" height="730" allowfullscreen frameborder="0"></iframe>\n',
        );
    }
}


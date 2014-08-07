<?php
/**
 * CollegeHumor.php
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
 * The CollegeHumor.com Provider
 * @link http://www.collegehumor.com/
 */
class CollegeHumor extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.collegehumor.com/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->addWWW();
        return (preg_match('~collegehumor\.com/(?:video|embed)/(?:[0-9]{5,10})/?~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function modifyResponse(array $response = array())
    {
        if (!empty($response['html'])) {
            $spam = array('~<p>(?:.*)</p>~i', '~<div (?:.*)</div>~i');
            $response['html'] = preg_replace($spam, '', $response['html']);
        }

        return $response;
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        $url = str_replace(array('/video/', '/embed/'), '/e/', $this->url);
        return array(
            'type' => 'video',
            'provider_name' => 'CollegeHumor',
            'provider_url' => 'http://www.collegehumor.com',
            'html' => '<iframe src="' . $url . '" width="{width}" height="{height}" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>',
        );
    }
}

?>

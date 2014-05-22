<?php
/**
 * Chirbit.php
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
 * The chirb.it Provider
 * @link http://chirb.it
 */
class Chirbit extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://chirb.it/oembed.json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~chirb\.it/(?:[\w\d]+)/?$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    protected function normalizeUrl()
    {
        if (preg_match('~chirb\.it/wp/([\w\d]+)/?~i', $this->url, $matches))
            $this->url = new \Embera\Url('http://chirb.it/' . $matches['1']);
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~chirb\.it/([\w\d]+)/?~i', $this->url, $matches);

        return array(
            'type' => 'rich',
            'provider_name' => 'chirbit',
            'provider_url' => 'http://www.chirbit.com/',
            'thumbnail_url' => 'http://chirb.it/chirbit_oembedpic.jpg',
            'html' => '<iframe height="{height}" frameborder="0" width="{width}" scrolling="NO" src="http://chirb.it/wp/' . $matches['1'] . '">This browser does not show iframe content. Listen to this chirbit here <a href="http://chirb.it/' . $matches['1'] . '">http://chirb.it/' . $matches['1'] . '</a></iframe>',
        );
    }

}

?>

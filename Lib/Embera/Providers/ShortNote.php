<?php
/**
 * ShortNote.php
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
 * The shortnote.jp Provider
 * @link https://www.shortnote.jp
 */
class ShortNote extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://www.shortnote.jp/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->convertToHttps();
        $this->url->addWWW();
        $this->url->stripLastSlash();

        return (preg_match('~shortnote\.jp/view/notes/(?:[^ /]+)$~is', $this->url));
    }


    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~/view/notes/([^ /]+)~i', $this->url, $matches);

        return array(
            'type' => 'rich',
            'provider_name' => 'ShortNote',
            'provider_url' => 'https://www.shortnote.jp/',
            'html' => '<iframe src="https://www.shortnote.jp/view/notes/' . $matches['1'] . '/embed" frameborder="0" width="{width}" height="{height}"></iframe>',
        );
    }
}

?>

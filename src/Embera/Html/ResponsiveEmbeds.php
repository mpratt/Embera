<?php
/**
 * ResponsiveEmbeds.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\html;

/**
 * Class Responsable of converting html into responsive html.
 */
class ResponsiveEmbeds
{
    /** @var array Blacklist of providers that cant use responsive embeds */
    protected $blacklist = [
        'Audioboom', 'AudioClip', 'Backtracks', 'BeautifulAI', 'Blogcast'
    ];

    /**
     * Attempts to transform the html key of the response
     * with a responsive alternative.
     *
     * @param array $response
     * @return array
     */
    public function transform(array $response)
    {
        if (!empty($response['html']) && isset($response['embera_provider_name']) && isset($response['type']) && !in_array($response['embera_provider_name'], $this->blacklist)) {
            $response['html_pre_responsive'] = $response['html'];
            $response['html'] = $this->removeWidthHeightAttributes($response['html']);
            $response['html'] = $this->removeWidthHeightStyles($response['html']);
            $response['html'] = $this->addClasses($response['html'], $response['type']);
            $response['html'] = $this->wrapInsideDiv($response['html'], $response['type']);
        }

        return $response;
    }

    /**
     * Removes the Width and Height attributes from a tag
     *
     * @param string $text
     * @return string
     *
     */
    protected function removeWidthHeightAttributes($text)
    {
       return preg_replace('~(width|height)="\d*"\s~i', '', $text);
    }

    /**
     * Removes the Width/Height from inline styles
     *
     * @param string $text
     * @return string
     */
    protected function removeWidthHeightStyles($text)
    {
        return preg_replace('~(width|height|max-width|max-height):[0-9]+[a-z]{2};?~i', '',$text);
    }

    /**
     * Adds item classes to an html tag
     *
     * @param string $text
     * @param string $type
     * @return string
     */
    protected function addClasses($text, $type)
    {
        $class= 'embera-embed-responsive-item-' . $type;
        if (preg_match('~class="(.+?)"~i', $text)) {
            return preg_replace('~class="(.+?)"~i', 'class="$1 ' . $class . '"', $text);
        }

        foreach (['iframe', 'img'] as $tag) {
            if (preg_match('~<' . $tag . '~i', $text)) {
                return str_ireplace('<' . $tag, '<' . $tag . ' class="' . $class . '"', $text);
            }
        }

        return $text;
    }

    /**
     * Wraps the whole html inside a new div with custom attributes.
     *
     * @param string $text
     * @param string $type
     * @return string
     */
    protected function wrapInsideDiv($text, $type)
    {
        return '<div class="embera-embed-responsive embera-embed-responsive-' . $type . '">' . $text . '</div>';
    }

}

<?php
/**
 * IFTTT.php
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
 * The ifttt.com Provider
 * @link https://ifttt.com
 */
class IFTTT extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://ifttt.com/oembed/?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->convertToHttps();

        return (preg_match('~ifttt\.com/recipes/(?:[0-9]+)/?$~i', $this->url));
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~/([0-9]+)/?$~i', $this->url, $matches);
        $html = '<a href="https://ifttt.com/view_embed_recipe/' . $matches['1'] . '" target="_blank" class="embed_recipe embed_recipe-l_28" id= "embed_recipe-' . $matches['1'] . '"><img src="https://ifttt.com/recipe_embed_img/' . $matches['1'] . '" alt="" width="{width}px"/></a>';
        $html .= '<script async type="text/javascript" src= "//ifttt.com/assets/embed_recipe.js"></script>';
        return array(
            'type' => 'rich',
            'provider_name' => 'IFTTT',
            'provider_url' => 'https://ifttt.com',
            'html' => $html
        );
    }
}

?>

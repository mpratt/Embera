<?php
/**
 * LazyLoading.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Html;

/**
 * Class responsable of adding native lazy loading to iframes and images.
 */
class LazyLoading
{
    /**
     * Adds the loading="lazy" attribute to the iframe and img
     * tags found on the html key of the response.
     *
     * @param array $response
     * @return array
     */
    public function transform(array $response)
    {
        if (!empty($response['html'])) {
            $response['html'] = $this->addLoadingAttribute($response['html']);
        }

        return $response;
    }

    /**
     * Adds the loading attribute to every iframe/img tag outside script blocks.
     * Scripts are skipped because tags inside them are usually javascript strings,
     * where an unescaped attribute could break the code.
     *
     * @param string $html
     * @return string
     */
    protected function addLoadingAttribute($html)
    {
        $parts = preg_split('~(<script\b.*?</script>)~is', $html, -1, PREG_SPLIT_DELIM_CAPTURE);
        foreach ($parts as $index => $part) {
            if ($index % 2 === 0) {
                $parts[$index] = preg_replace_callback('~<(iframe|img)\b[^>]*>~i', [$this, 'addLoadingAttributeToTag'], $part);
            }
        }

        return implode('', $parts);
    }

    /**
     * Adds the loading attribute to a single tag, unless it already has one.
     *
     * @param array $matches
     * @return string
     */
    protected function addLoadingAttributeToTag(array $matches)
    {
        if (preg_match('~\sloading\s*=~i', $matches[0])) {
            return $matches[0];
        }

        return '<' . $matches[1] . ' loading="lazy"' . substr($matches[0], strlen($matches[1]) + 1);
    }
}

<?php
/**
 * Embera.php
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
 * This Class is in charge of replacing content, ignoring specific
 * html tags.
 */
class IgnoreTags
{
    /** @var array with tags that should be ignored */
    protected $tags = [];

    /** @var array with placeholders to be reserved/restored */
    protected $holder = [];

    /**
     * Constructor
     *
     * @param array $tags The tags that should be ignored
     * @return void
     */
    public function __construct(array $tags)
    {
        $this->tags = $tags;
    }

    /**
     * Process the content and do the replacements
     *
     * @param string $content
     * @param array $table     Array with the conversions that should be made. Normally in the url -> html relation.
     * @return string
     */
    public function replace($content, array $table)
    {
        foreach ($this->tags as $t) {
            $content = $this->reserveTag($content, $t);
        }

        return $this->restoreHolders(strtr($content, $table));
    }

    /**
     * Reserves a tag, which in this case, all it does is replace the html tag
     * with a placeholder.
     *
     * @param string $content
     * @param string $tag
     * @return string
     */
    protected function reserveTag($content, $tag)
    {
        if (stripos($content, '<' . $tag) !== false) {

            if ('img' == strtolower($tag)) {
                $pattern = '~(<' . preg_quote($tag, '~') . '[^>]+\>)~i';
            } else {
                $pattern = '~(<' . preg_quote($tag, '~') . '\\b[^>]*?>[\\s\\S]*?<\\/' . preg_quote($tag, '~') . '>)~i';
            }

            return preg_replace_callback($pattern, array($this, 'placeHolder'), $content);
        }

        return $content;
    }

    /**
     * Assigns a placeholder to the matched content. Its used by preg_replace_callback
     *
     * @param array $matches
     * @return string
     */
    protected function placeHolder(array $matches)
    {
        $placeholder = '%{{' . md5(time() . count($this->holder) . mt_rand(0, 500)) . '}}%';
        $this->holder[$placeholder] = $matches['1'];

        return $placeholder;
    }

    /**
     * Restores all the dummy placeholders with the original content
     *
     * @param string $content
     * @return string
     */
    protected function restoreHolders($content)
    {
        if (!empty($this->holder)) {

            /**
             * Now the question that you might be asking yourself is, why use a 'for' loop instead
             * of the plain 'str_replace' function once?
             *
             * Well, since html can be nested, there might be cases were a placeholder was placed inside
             * another placeholder and if we do just one 'str_replace', we might not get the full original
             * content.
             *
             * In order to ensure that no data is lost, we need to run 'str_replace' for each time a tag
             * was registered in the constructor. That is the worst case scenario, most of the times, the loop
             * is just going to run once and repeat the cycle only if there are signs that another placeholder is in
             * the content.
             */
            $count = count($this->tags) + 1;
            for ($i=0; $i < $count; $i++) {
                $content = str_replace(array_keys($this->holder), array_values($this->holder), $content);
                if (strpos($content, '%{{') === false) {
                    break;
                }
            }

        }

        return $content;
    }

}

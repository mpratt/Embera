<?php
/**
 * LazyLoadingTest.php
 *
 * @package Tests
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Embera\Html;

use PHPUnit\Framework\TestCase;

class LazyLoadingTest extends TestCase
{
    public function testResponseWithoutHtmlIsUntouched()
    {
        $lazyLoading = new LazyLoading();

        $this->assertEquals(['type' => 'link'], $lazyLoading->transform(['type' => 'link']));
        $this->assertEquals(['type' => 'video', 'html' => ''], $lazyLoading->transform(['type' => 'video', 'html' => '']));
    }

    public function testAddsLoadingAttributeToIframes()
    {
        $html = '<iframe width="560" height="315" src="https://www.youtube.com/embed/ovpVWuuUgJg" allowfullscreen></iframe>';
        $expected = '<iframe loading="lazy" width="560" height="315" src="https://www.youtube.com/embed/ovpVWuuUgJg" allowfullscreen></iframe>';

        $this->assertEquals($expected, $this->transformHtml($html));
    }

    public function testAddsLoadingAttributeToImages()
    {
        $html = '<img src="https://example.com/photo.jpg" alt="Photo" />';
        $expected = '<img loading="lazy" src="https://example.com/photo.jpg" alt="Photo" />';

        $this->assertEquals($expected, $this->transformHtml($html));
    }

    public function testTagNamesAreCaseInsensitive()
    {
        $html = '<IFRAME src="https://example.com/embed"></IFRAME><IMG src="https://example.com/photo.jpg">';
        $expected = '<IFRAME loading="lazy" src="https://example.com/embed"></IFRAME><IMG loading="lazy" src="https://example.com/photo.jpg">';

        $this->assertEquals($expected, $this->transformHtml($html));
    }

    public function testKeepsLoadingAttributeSentByTheProvider()
    {
        $html = '<iframe src="https://example.com/embed" loading="eager"></iframe><img LOADING="lazy" src="https://example.com/photo.jpg">';

        $this->assertEquals($html, $this->transformHtml($html));
    }

    public function testTransformsEveryTag()
    {
        $html = '<div><img src="https://example.com/a.jpg"><iframe src="https://example.com/embed"></iframe><img src="https://example.com/b.jpg"></div>';
        $expected = '<div><img loading="lazy" src="https://example.com/a.jpg"><iframe loading="lazy" src="https://example.com/embed"></iframe><img loading="lazy" src="https://example.com/b.jpg"></div>';

        $this->assertEquals($expected, $this->transformHtml($html));
    }

    public function testIgnoresTagsInsideScripts()
    {
        $html = '<iframe src="https://example.com/embed"></iframe><script>document.write("<iframe src=\"https://example.com/other\"></iframe>");</script><img src="https://example.com/photo.jpg">';
        $expected = '<iframe loading="lazy" src="https://example.com/embed"></iframe><script>document.write("<iframe src=\"https://example.com/other\"></iframe>");</script><img loading="lazy" src="https://example.com/photo.jpg">';

        $this->assertEquals($expected, $this->transformHtml($html));
    }

    public function testIgnoresTagsThatOnlyStartWithTheSameLetters()
    {
        $html = '<svg><image href="https://example.com/a.png" /></svg><iframes></iframes>';

        $this->assertEquals($html, $this->transformHtml($html));
    }

    protected function transformHtml($html)
    {
        $lazyLoading = new LazyLoading();
        $response = $lazyLoading->transform(['type' => 'rich', 'html' => $html]);

        return $response['html'];
    }
}

<?php
/**
 * IgnoreTagsTest.php
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

use Embera\Embera;

class IgnoreTagsTest extends TestCase
{
    public function testDontReplaceInsideDefaultTags()
    {
        $data = [
            '<a href="http://youtu.be/fSUK4WgQ3vk" title="">http://youtu.be/fSUK4WgQ3vk</a>',
            '<iframe width="420" height="315" src="//www.youtube.com/embed/fSUK4WgQ3vk" frameborder="0" allowfullscreen></iframe>',
            '<a href="http://youtu.be/fSUK4WgQ3vk">other link</a>',
            '<img src="http://youtu.be/fSUK4WgQ3vk" alt="" />',
            '<iframe width="420" height="315" src="//www.youtube.com/embed/fSUK4WgQ3vk" frameborder="0" allowfullscreen></iframe>',
            '<img src="http://youtu.be/fSUK4WgQ3vk" title="">',
            '<pre>My   House http://youtu.be/fSUK4WgQ3vk   </pre>',
            '<code>http://youtu.be/fSUK4WgQ3vk</code>',
        ];

        $embera = new Embera([
            'fake_responses' => Embera::ONLY_FAKE_RESPONSES,
            'ignore_tags' => [ 'pre', 'code', 'a', 'img', 'iframe' ],
        ]);

        $result = $embera->autoEmbed(implode(', ', $data));
        $this->assertEquals($result, implode(', ', $data));
    }

    public function testDontReplaceNestedContent()
    {
        $data = [
            '<a href="http://myurl.com" title="">http://myurl.com</a>' => '<a href="http://myurl.com" title="">http://myurl.com</a>',
            'http://myurl.com' => 'replaced'
        ];

        $p = new IgnoreTags(['a', 'pre', 'img', 'code']);
        $result = $p->replace(implode(', ', array_keys($data)), ['http://myurl.com' => 'replaced']);
        $this->assertEquals($result, implode(', ', array_values($data)));
    }

    public function testDontReplaceNestedContentAdvanced()
    {
        $html = '<code>
                <a href="http://myurl.com" title="">http://myurl.com <img src="http://myurl.com" title=""/></a>
                <pre class="hey">http://myurl.com</pre> http://myurl.com
            </code>
            <code>
                <pre>
                    <a href="http://myurl.com" title="">
                        <img src="http://myurl.com" title="" /> Check Out My Url
                        <a class="hey" href="http://myurl.com">myurl.com</a>
                        <a href="http://myurl.com" title="">http://myurl.com <img src="http://myurl.com" title=""/></a>
                    </a>
                </pre>
            </code>
            <img src="http://myurl.com" title="" />
            <img src="http://myurl.com" title="">';

        $testData = [
            'http://myurl.com' => 'replaced',
            $html => $html,
        ];

        foreach ($testData as $data => $expected) {
            $p = new IgnoreTags(['a', 'pre', 'img', 'code']);
            $result = $p->replace($data, ['http://myurl.com' => 'replaced']);
            $this->assertEquals($result, $expected);
        }
    }

    public function testFuckedUpHtmlContent()
    {
        $testData = array(
            '<pre> this dumb html has no ending tag',
            '<a href="shit"><pre> this shit html is not that great </a></pre>',
        );

        foreach ($testData as $data) {
            $p = new IgnoreTags(['a', 'pre', 'img', 'code']);
            $result = $p->replace($data, ['shit' => 'dumb']);
            $this->assertEquals($result, $data);
        }
    }

}

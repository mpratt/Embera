<?php
/**
 * TestHtmlProcessor.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class TestHtmlProcessor extends PHPUnit_Framework_TestCase
{
    public function testDontReplaceInsideDefaultTags()
    {
        $expected = array(
            '<a href="http://youtu.be/fSUK4WgQ3vk" title="">http://youtu.be/fSUK4WgQ3vk</a>',
            '<iframe width="420" height="315" src="//www.youtube.com/embed/fSUK4WgQ3vk" frameborder="0" allowfullscreen></iframe>',
            '<a href="http://youtu.be/fSUK4WgQ3vk">other link</a>',
            '<img src="http://youtu.be/fSUK4WgQ3vk" alt="" />',
            '<iframe width="420" height="315" src="//www.youtube.com/embed/fSUK4WgQ3vk" frameborder="0" allowfullscreen></iframe>',
            '<img src="http://youtu.be/fSUK4WgQ3vk" title="">',
            '<pre>My   House http://youtu.be/fSUK4WgQ3vk   </pre>',
            '<code>http://youtu.be/fSUK4WgQ3vk</code>',
        );

        $data = array(
            '<a href="http://youtu.be/fSUK4WgQ3vk" title="">http://youtu.be/fSUK4WgQ3vk</a>',
            'http://youtu.be/fSUK4WgQ3vk',
            '<a href="http://youtu.be/fSUK4WgQ3vk">other link</a>',
            '<img src="http://youtu.be/fSUK4WgQ3vk" alt="" />',
            'http://youtu.be/fSUK4WgQ3vk',
            '<img src="http://youtu.be/fSUK4WgQ3vk" title="">',
            '<pre>My   House http://youtu.be/fSUK4WgQ3vk   </pre>',
            '<code>http://youtu.be/fSUK4WgQ3vk</code>',
        );

        $embera = new \Embera\Embera(array('oembed' => false));
        $result = $embera->autoEmbed(implode(', ', $data));

        $this->assertEquals($result, implode(', ', $expected));
    }

    public function testDontReplaceNestedContent()
    {
        $expected = array(
            '<a href="http://myurl.com" title="">http://myurl.com</a>',
            'replaced',
            '<pre> <img src="http://myurl.com" title=""> Check Out My Url <a href="http://myurl.com" title="">http://myurl.com <img src="http://myurl.com" title=""/></a></pre>',
        );

        $data = array(
            '<a href="http://myurl.com" title="">http://myurl.com</a>',
            'http://myurl.com',
            '<pre> <img src="http://myurl.com" title=""> Check Out My Url <a href="http://myurl.com" title="">http://myurl.com <img src="http://myurl.com" title=""/></a></pre>',
        );

        $p = new \Embera\HtmlProcessor(array('a', 'pre', 'img', 'code'), array('http://myurl.com' => 'replaced'));
        $result = $p->process(implode(', ', $data));

        $this->assertEquals($result, implode(', ', $expected));
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

        $testData = array(
            'replaced' => 'http://myurl.com',
            $html => $html,
        );

        foreach ($testData as $expected => $data) {
            $p = new \Embera\HtmlProcessor(array('a', 'pre', 'img', 'code'), array('http://myurl.com' => 'replaced'));
            $result = $p->process($data);

            $this->assertEquals($result, $expected);
        }
    }

    public function testFuckedUpHtmlContent()
    {
        $testData = array(
            '<pre> this dumb html has no ending tag' => '<pre> this shit html has no ending tag',
            '<a href="shit"><pre> this shit html is not that great </a></pre>' => '<a href="shit"><pre> this shit html is not that great </a></pre>',
        );


        foreach ($testData as $expected => $data) {
            $p = new \Embera\HtmlProcessor(array('a', 'pre', 'img'), array('shit' => 'dumb'));
            $result = $p->process($data);

            $this->assertEquals($result, $expected);
        }
    }
}

?>

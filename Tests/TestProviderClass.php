<?php
/**
 * TestProviderClass.php
 *
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class TestProviderClass extends PHPUnit_Framework_TestCase
{
    public function testInvalidProviders()
    {
        $p = new \Embera\Providers(array());
        $this->assertEmpty($p->getAll());

        $p = new \Embera\Providers(null);
        $this->assertEmpty($p->getAll());

        $p = new \Embera\Providers('http://www.unknown.com');
        $this->assertEmpty($p->getAll());

        $urls = array('http://www.unknown.com/path/stuf/?hi=1',
                      'http://www.thewalkingdead.com/stuff/');

        $p = new \Embera\Providers($urls);
        $this->assertEmpty($p->getAll());
    }

    public function testYoutubeDetection()
    {
        $urls = array('http://www.youtube.com/watch?v=9bZkp7q19f0',
                      'http://youtube.com/watch?v=J---aiyznGQ',
                      'http://www.youtube.com/watch?v=xVrJ8DxECbg&list=PLwnD0jwK0yymXOCl82nqdTdxe0ykVDcPW&index=1',
                      'http://youtube.com/watch?v=xVrJ8DxECbg&list=PLwnD0jwK0yymXOCl82nqdTdxe0ykVDcPW&index=1',
                      'http://youtube.com/watch?v=mghhLqu31cQ',
                      'http://youtu.be/8aGEb_yUpMs');

        $p = new \Embera\Providers($urls);
        $this->assertCount(6, $p->getAll());

        $urls = array_merge($urls, array('http://youtube.com/watch?list=hi',
                                         'http://www.youtube.com/watch?lol=no',
                                         'http://youtube.com/',
                                         'http://www.youtube.com/?id=ho'));

        $p = new \Embera\Providers($urls);
        $this->assertCount(6, $p->getAll());

        $p = new \Embera\Providers('http://youtube.com/watch?v=J---aiyznGQ');
        $this->assertCount(1, $p->getAll());
    }
}
?>

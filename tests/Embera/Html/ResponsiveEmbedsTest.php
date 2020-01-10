<?php
/**
 * ResponsiveEmbedsTest.php
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

class ResponsiveEmbedsTest extends TestCase
{
    public function testEmptyHtmlResponse()
    {
        $response = [
            'type' => 'video',
            'embera_provider_name' => 'Youtube',
            'html' => '',
            'other' => true,
        ];

        $responsive = new ResponsiveEmbeds();
        $this->assertEquals($responsive->transform($response), $response);
    }

    public function testBasicYoutubeResponse()
    {
        $html = '<iframe width="560" height="315" src="https://www.youtube.com/embed/ovpVWuuUgJg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        $expected = '<div class="embera-embed-responsive embera-embed-responsive-video embera-embed-responsive-provider-youtube"><iframe class="embera-embed-responsive-item embera-embed-responsive-item-video" src="https://www.youtube.com/embed/ovpVWuuUgJg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
        $response = [
            'type' => 'video',
            'embera_provider_name' => 'Youtube',
            'html' => $html,
        ];

        $responsive = new ResponsiveEmbeds();
        $responsiveResponse = $responsive->transform($response);
        $this->assertEquals($expected, $responsiveResponse['html']);
    }

    public function testAdvancedYoutubeResponse()
    {
        $html = '<iframe class="example" width="560" height="315" src="https://www.youtube.com/embed/ovpVWuuUgJg" frameborder="0" style="width:100px;margin:0;height:40px;max-height:100px;" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        $expected = '<div class="embera-embed-responsive embera-embed-responsive-video embera-embed-responsive-provider-youtube"><iframe class="example embera-embed-responsive-item embera-embed-responsive-item-video" src="https://www.youtube.com/embed/ovpVWuuUgJg" frameborder="0" style="margin:0;" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
        $response = [
            'type' => 'video',
            'embera_provider_name' => 'Youtube',
            'html' => $html,
        ];

        $responsive = new ResponsiveEmbeds();
        $responsiveResponse = $responsive->transform($response);
        $this->assertEquals($expected, $responsiveResponse['html']);
    }

}

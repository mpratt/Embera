<?php
/**
 * DotSUBTest.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Provider;

use Embera\ProviderTester;

/**
 * Test the DotSUB Provider
 */
final class DotSUBTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://dotsub.com/view/f2a85663-d9eb-4d92-bb61-fd960c401b23',
            'https://www.dotsub.com/media/0ebc725c-a805-4486-a1df-c1e7dccf8c6e/',
            'https://dotsub.com/view/b7a2859d-69a3-45f2-8e4e-88f2f15b3f97',
        ),
        'invalid_urls' => array(
            'https://dotsub.com/',
            'https://dotsub.com/view/',
            'https://dotsub.com/view/mostviewed/',
        ),
        'normalize_urls' => array(
            'http://dotsub.com/media/b7a2859d-69a3-45f2-8e4e-88f2f15b3f97?query=string' => 'https://dotsub.com/view/b7a2859d-69a3-45f2-8e4e-88f2f15b3f97',
        ),
        'fake_response' => array(
            'type' => 'video',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('DotSUB', [ 'width' => 480, 'height' => 270]);
    }
}

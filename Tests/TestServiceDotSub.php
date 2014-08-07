<?php
/**
 * TestServiceDotSub.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceDotSub extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://dotsub.com/view/f2a85663-d9eb-4d92-bb61-fd960c401b23',
            'http://dotsub.com/view/0ebc725c-a805-4486-a1df-c1e7dccf8c6e/',
            'http://www.dotsub.com/view/dcef6c2a-3fb7-4ab1-9bc8-fd621b2c3972',
            'http://dotsub.com/media/b7a2859d-69a3-45f2-8e4e-88f2f15b3f97',
            'http://dotsub.com/view/85897135-c6ee-4c93-acdd-d7e7f4d08b6e',
            'http://dotsub.com/view/99eaba09-787a-40a9-9125-27a729de71db',
            'http://dotsub.com/view/99eaba09-787a-40a9-9125-27a729de71db/other/stuff',
        ),
        'invalid' => array(
            'http://dotsub.com/view/xxx-xxx-xxxx-xxxx-xxxxx', // It seems that dotsub uses base 64 only as id
            'http://dotsub.com/view/',
            'http://dotsub.com/view/?',
            'http://dotsub.com/view/mostviewed',
            'http://dotsub.com/view/language/both/dug',
            'http://dotsub.com',
        ),
        'normalize' => array(
            'http://www.dotsub.com/media/396b2b58-9a9c-42f3-b7cb-4a282964b11c/embed/' => 'http://dotsub.com/view/396b2b58-9a9c-42f3-b7cb-4a282964b11c',
            'http://www.dotsub.com/media/396b2b58-9a9c-42f3-b7cb-4a282964b11c/e/c?width=500&height=300' => 'http://dotsub.com/view/396b2b58-9a9c-42f3-b7cb-4a282964b11c',
            'http://dotsub.com/media/5af2ea32-1aa1-4fa7-9d36-b3a01e841ca2/embed/' => 'http://dotsub.com/view/5af2ea32-1aa1-4fa7-9d36-b3a01e841ca2',
        ),
        'fake' => array(
            'type' => 'video',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('DotSub'); }
}
?>

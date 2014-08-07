<?php
/**
 * TestServiceCoub.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceCoub extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://coub.com/view/2gik7tu6',
            'http://coub.com/view/1i2na5tm',
            'http://www.coub.com/view/2oa3zbsr',
            'http://coub.com/embed/20v82p5j',
            'http://coub.com/embed/omwe0oe/',
            'http://coub.com/view/2m7mett8/',
            'http://coub.com/embed/29zkqoco',
        ),
        'invalid' => array(
            'http://coub.com/explore/art-design',
            'http://coub.com/view/2m7mett8/other-stuff/',
            'http://coub.com/explore/girls',
            'http://coub.com/embed/',
            'http://coub.com/view/',
            'http://coub.com/',
        ),
        'normalize' => array(
            'http://coub.com/view/231nevc?small_suggest_place=3' => 'http://coub.com/view/231nevc',
            'http://coub.com/view/231nevc/?small_suggest_place=3&stuff=hihi-hi' => 'http://coub.com/view/231nevc',
            'http://www.coub.com/view/231nevc?small_suggest_place=3&stuff=hihi-hi' => 'http://coub.com/view/231nevc',
        ),
        'fake' => array(
            'type' => 'video',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('Coub'); }
}
?>

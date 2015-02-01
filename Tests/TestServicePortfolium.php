<?php
/**
 * TestServicePortfolium.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServicePortfolium extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://portfolium.com/entry/first-engineering-experience',
            'https://portfolium.com/entry/stephanie_lowlight-photography',
            'http://portfolium.com/entry/flora',
            'https://www.portfolium.com/entry/fresh-reds',
            'https://portfolium.com/entry/the-joker-painting/',
            'https://portfolium.com/entry/silver?querystring=stuff&yes=1',
        ),
        'invalid' => array(
            'https://portfolium.com/entries',
            'https://portfolium.com/',
            'https://portfolium.com/entries/category/art-design',
            'https://portfolium.com/entry/the-joker-painting/other-stuff-on-address',
        )
    );

    public function testProvider()
    {
        $this->validateProvider('Portfolium');
    }
}
?>

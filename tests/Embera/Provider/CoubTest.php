<?php
/**
 * CoubTest.php
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
 * Test the coub.com Provider
 */
final class CoubTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'http://coub.com/view/2gik7tu6',
            'http://www.coub.com/view/2oa3zbsr',
            'http://coub.com/embed/20v82p5j',
        ),
        'invalid_urls' => array(
            'http://coub.com/explore/art-design',
            'http://coub.com/view/2m7mett8/other-stuff/',
            'http://coub.com/explore/girls',
            'http://coub.com/embed/',
            'http://coub.com/view/',
            'http://coub.com/',
        ),
        'normalize_urls' => array(
            'http://coub.com/view/231nevc?small_suggest_place=3' => 'https://coub.com/view/231nevc',
            'http://coub.com/view/231nevc/?small_suggest_place=3&stuff=hihi-hi' => 'https://coub.com/view/231nevc',
            'http://www.coub.com/view/231nevc?small_suggest_place=3&stuff=hihi-hi' => 'https://coub.com/view/231nevc',
        ),
        'fake_response' => array(
            'type' => 'video',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('Coub', [ 'width' => 480, 'height' => 270]);
    }
}

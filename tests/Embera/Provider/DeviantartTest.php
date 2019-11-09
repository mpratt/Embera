<?php
/**
 * DeviantartTest.php
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
 * Test the Deviantart Provider
 */
final class DeviantartTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://www.deviantart.com/mari-m007/art/Birds-322544540',
            'http://deviantart.com/martinimal/art/Tenerife-817381930',
            'http://wordofchen.deviantart.com/art/Pressure-379617958/',
            'http://fav.me/dd13x6f',
        ),
        'invalid_urls' => array(
            'http://lieveheersbeestje.deviantart.com/art/house/Heart-of-gold-378848984',
            'http://wordofchen.deviantart.com/soup/Pressure-379617958',
            'http://fav.me/d69yyh3/stuff/',
        ),
        'normalize_urls' => array(
            'http://m-eralp.deviantart.com/art/After-rain-bomb-379561772/?q=1' => 'https://m-eralp.deviantart.com/art/After-rain-bomb-379561772',
        ),
    );

    public function testProvider()
    {
        $this->validateProvider('Deviantart', [ 'width' => 480, 'height' => 270]);
    }
}

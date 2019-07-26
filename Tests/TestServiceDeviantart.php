<?php
/**
 * TestServiceDeviantart.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceDeviantart extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://wordofchen.deviantart.com/art/Pressure-379617958/',
            'http://sarahharas1.deviantart.com/art/Purple-haze-379565213/',
            'http://m-eralp.deviantart.com/art/After-rain-bomb-379561772',
            'http://fav.me/d69yyh3/',
            'http://fav.me/d67maku',
        ),
        'invalid' => array(
            'http://lieveheersbeestje.deviantart.com/art/house/Heart-of-gold-378848984',
            'http://wordofchen.deviantart.com/soup/Pressure-379617958',
            'http://sarahharas1.deviantart.com/class/379565213',
            'http://fav.me/d69yyh3/stuff/',
            'http://sta.sh/',
            'http://fav.me/',
        ),
        'private' => array(
            'http://sooper-deviant.deviantart.com/art/Brand-New-Day-1769-376513535'
        )
    );

    public function testProvider() { $this->validateProvider('Deviantart'); }
}

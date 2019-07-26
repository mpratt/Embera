<?php
/**
 * TestServiceRdio.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceRdio extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://rd.io/x/Q1IjXC8s',
            'http://www.rdio.com/artist/The_Black_Keys/album/Brothers/',
            'http://www.rdio.com/artist/Nine_Inch_Nails/album/The_Downward_Spiral_1/track/Hurt/',
            'http://rdio.com/people/Pitchfork/playlists/13082/Top_Singles_of_2000-2004/',
            'http://www.rdio.com/artist/Washed_Out/album/Paracosm_1/',
            'http://www.rdio.com/artist/Earl_Sweatshirt/album/Doris/',
            'http://www.rdio.com/artist/Marre/album/Sombras_De_Luz_1',
        ),
        'invalid' => array(
            'http://rd.io/Q1IjXC8s',
            'http://www.rdio.com/artist/The_Black_Keys/',
            'http://www.rdio.com',
            'http://www.rdio.com/browse/new',
            'http://www.rdio.com/browse/charts/albums',
        ),
    );

    public function testProvider() { $this->validateProvider('Rdio'); }
}

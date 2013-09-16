<?php
/**
 * TestServiceGeographDe.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceGeographDe extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://geo-en.hlipp.de/photo/36058',
            'http://geo-en.hlipp.de/photo/22092/',
            'http://geo.hlipp.de/photo/35233',
            'http://geo.hlipp.de/photo/30213',
            'http://germany.geograph.org/photo/40426',
            'http://germany.geograph.org/photo/36058',
        ),
        'invalid' => array(
            'http://geo-en.hlipp.de/discuss/',
            'http://geo-en.hlipp.de/latlong.php',
            'http://geo-en.hlipp.de/gallery/historische_bauten_historic_buildings_127',
            'http://geo.hlipp.de/photo/35233/more-stuff',
        ),
    );

    public function testProvider() { $this->validateProvider('GeographDe'); }
}
?>

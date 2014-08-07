<?php
/**
 * TestServiceVideoJug.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceVideoJug extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.videojug.com/film/how-to-use-your-ipod-click-wheel',
            'http://www.videojug.com/interview/vehicle-speed',
            'http://videojug.com/film/how-to-get-music-onto-your-ipod-from-a-cd',
            'http://www.videojug.com/film/how-to-make-a-line-graph-in-excel/',
            'http://www.videojug.com/film/how-to-fix-a-scratched-xbox-360-game',
            'http://www.videojug.com/film/how-to-change-a-car-battery-2',
        ),
        'invalid' => array(
            'http://www.videojug.com/tag/video-games-and-consoles',
            'http://www.videojug.com/tag/technology-and-cars',
            'http://www.videojug.com/film/technology-and-cars/other/stuff',
            'http://www.videojug.com',
        ),
    );

    public function testProvider() { $this->validateProvider('VideoJug'); }
}
?>

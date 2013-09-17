<?php
/**
 * TestServiceSpotify.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceSpotify extends TestProviders
{
    protected $urls = array();

    public function testProvider()
    {
        $this->markTestIncomplete('Urls needed! On the other hand is not possible for me to test this service due to my location.');

        $this->validateProvider('Spotify');
    }
}
?>

<?php
/**
 * TestServiceIndaco.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceIndaco extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://player.indacolive.com/player/jwp/clients/test/2016/9/pallacanestro_reggiana/',
        ),
        'invalid' => array(
            'http://indacolive.com/',
        ),
    );

    public function testProvider() { $this->validateProvider('Indaco'); }
}
?>

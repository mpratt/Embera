<?php
/**
 * TestServicePunters.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServicePunters extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://www.punters.com.au/horses/Sons-of-John_300143/',
            'https://www.punters.com.au/horses/Mansplaining_530049/',
        ),
        'invalid' => array(
            'https://www.punters.com.au/',
            'https://www.punters.com.au/racing-results/victoria/Mildura/2017-04-03/',
        ),
    );

    public function testProvider() { $this->validateProvider('Punters'); }
}
?>

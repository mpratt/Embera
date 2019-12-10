<?php
/**
 * TestServicePollDaddy.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServicePollDaddy extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://www.playbuzz.com/craigkelly10/which-james-dean-character-are-you',
        ),
        'invalid' => array(
            'https://www.playbuzz.com/'
        ),
    );

    public function testProvider() { $this->validateProvider('Playbuzz'); }
}
?>

<?php
/**
 * TestServicePastery.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServicePastery extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://www.pastery.net/api/',
            'https://www.pastery.net/about/'
        ),
        'invalid' => array(
            'https://www.pastery.net/',
            'https://www.pastery.net/about/other-stuff',
        ),
    );

    /**
     * @large
     */
    public function testProvider() { $this->validateProvider('Pastery'); }
}

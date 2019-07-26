<?php
/**
 * TestServiceShowtheway.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceShowtheway extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://showtheway.io/to/48.85837,2.294481?name=Eiffel%20Tower',
            'http://showtheway.io/to/4.710989,-74.072092?name=Bogot%26aacute%3B',
            'https://www.showtheway.io/to/33.812092,-117.918974?name=Disneyland%20Park',
        ),
        'invalid' => array(
            'https://showtheway.io/',
            'https://showtheway.io/share',
            'https://showtheway.io/not/to/33.812092,-117.918974?name=Disneyland%20Park',
        ),
    );

    /**
     * @large
     */
    public function testProvider() { $this->validateProvider('Showtheway'); }
}

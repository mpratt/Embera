<?php
/**
 * TestServiceGyazo.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceGyazo extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://gyazo.com/71e107d77e8495f0e54d2e5b6dc5d326',
            'https://www.gyazo.com/ccfabfd135da6c7e766e719b01cf4cd9',
        ),
        'invalid' => array(
            'https://gyazo.com/',
            'https://gyazo.com/login',
            'https://gyazo.com/download',
        ),
    );

    public function testProvider() { $this->validateProvider('Gyazo'); }
}
?>

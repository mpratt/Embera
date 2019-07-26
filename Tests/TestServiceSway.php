<?php
/**
 * TestServiceSway.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceSway extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://sway.com/making_of_wildcat_sculpture',
            'https://www.sway.com/dBheQgVZ1RQBfiQU',
            'https://sway.com/nLa7rrYhdCmzRyQd/',
            'http://sway.com/universe_cheatsheet',
        ),
        'invalid' => array(
            'https://sway.com',
            'https://sway.com/s/making_of_wildcat_sculpture/embed',
        ),
        'fake' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('Sway'); }
}

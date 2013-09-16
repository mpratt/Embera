<?php
/**
 * TestServiceUrtak.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceUrtak extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://urtak.com/u/9387',
            'https://urtak.com/u/6588/',
            'https://www.urtak.com/u/6576',
            'https://www.urtak.com/u/2779/',
        ),
        'invalid' => array(
            'https://urtak.com/signup',
            'https://urtak.com/',
            'https://urtak.com/u/9387/other/stuff',
            'https://urtak.com/login',
        ),
    );

    public function testProvider() { $this->validateProvider('Urtak'); }
}
?>

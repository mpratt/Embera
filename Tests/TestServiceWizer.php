<?php
/**
 * TestServiceWizer.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceWizer extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://app.wizer.me/preview/K6EKW',
        ),
        'invalid' => array(
            'https://wizer.me/',
        ),
    );

    public function testProvider() { $this->validateProvider('Wizer'); }
}

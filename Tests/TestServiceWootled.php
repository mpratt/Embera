<?php
/**
 * TestServiceWootled.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceWootled extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.wootled.com/wg/0SbDvPCAzpWEstt',
        ),
        'invalid' => array(
            'http://wootled.com/',
        ),
    );

    public function testProvider() { $this->validateProvider('Wootled'); }
}
?>

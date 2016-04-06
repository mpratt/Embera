<?php
/**
 * TestServiceDidacte.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceDidacte extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://finchp.didacte.com/a/course/363?locale=fr',
        ),
        'invalid' => array(
            'http://www.didacte.com',
        ),
    );

    public function testProvider()
    {
        $this->validateProvider('Didacte');
    }
}
?>

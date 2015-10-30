<?php
/**
 * TestServiceEgliseInfo.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceEgliseInfo extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://egliseinfo.catholique.fr/horaires/paris',
            'http://egliseinfo.catholique.fr/a-proximite/paris',
        ),
        'invalid' => array(
            'http://egliseinfo.catholique.fr/'
        ),
    );

    public function testProvider() { $this->validateProvider('EgliseInfo'); }
}
?>

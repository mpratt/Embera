<?php
/**
 * TestServiceVidlit.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceVidlit extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://vidl.it/qAE6Kl',
            'http://vidl.it/Pdo',
        ),
        'invalid' => array(
            'https://vidl.it/',
            'https://vidl.it/video/workstation',
        ),
    );

    public function testProvider() { $this->validateProvider('Vidlit'); }
}
?>

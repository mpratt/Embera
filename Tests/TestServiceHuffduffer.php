<?php
/**
 * TestServiceHuffDuffer.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceHuffDuffer extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://huffduffer.com/jxpx777/125342',
            'http://huffduffer.com/Jozh/124683/',
            'http://huffduffer.com/shawnpwalsh/124687',
            'http://www.huffduffer.com/erichaberkorn/124686',
            'http://huffduffer.com/bulkorder/124688',
            'http://huffduffer.com/tfehr/124690',
            'http://huffduffer.com/jasonmklug/124719',
        ),
        'invalid' => array(
            'http://huffduffer.com/tags/productivity',
            'http://huffduffer.com/tags/weekly+security+audio+column',
            'http://huffduffer.com/signup/',
            'http://huffduffer.com/',
        ),
    );

    public function testProvider() { $this->validateProvider('HuffDuffer'); }
}
?>

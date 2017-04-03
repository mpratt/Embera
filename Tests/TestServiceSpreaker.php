<?php
/**
 * TestServiceSpreaker.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceSpreaker extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://www.spreaker.com/show/el-oasis',
            'https://spreaker.com/user/9234049/world-of-warcraft-arthas-rise-of-the-lic',
            'http://www.spreaker.com/show/isenacode-podcast',
        ),
        'invalid' => array(
            'https://www.spreaker.com/',
            'https://www.spreaker.com/login',
        ),
    );

    public function testProvider() { $this->validateProvider('Spreaker'); }
}
?>

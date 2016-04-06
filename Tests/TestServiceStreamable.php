<?php
/**
 * TestServiceStreamable.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceStreamable extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://streamable.com/si8d',
            'http://streamable.com/a7wj/',
            'https://www.streamable.com/um3p',
            'http://streamable.com/dgn9',
        ),
        'invalid' => array(
            'https://streamable.com/',
            'https://streamable.com/signin',
            'https://streamable.com/login',
            'https://streamable.com/about',
            'https://streamable.com/privacy',
            'https://streamable.com/terms',
        ),
    );

    public function testProvider() { $this->validateProvider('Streamable'); }
}
?>

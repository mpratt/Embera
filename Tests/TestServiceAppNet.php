<?php
/**
 * TestServiceAppNet.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceAppNet extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://alpha.app.net/lesechos/post/9152136',
            'http://alpha.app.net/popsugar/post/9145139',
            //'https://alpha.app.net/breakingnews/post/9141658/',
            //'https://photos.app.net/8244279/1',
        ),
        'invalid' => array(
            'https://unknown.app.net/breakingnews/post/9141658/',
            'https://aplpha.app.net/breakingnews/post/string/',
            'https://aplpha.app.net/post/9141658/',
            'https://aplpha.app.net/breakingnews/9141658/',
            'https://aplpha.app.net',
        ),
    );

    public function testProvider() { $this->validateProvider('AppNet'); }
}

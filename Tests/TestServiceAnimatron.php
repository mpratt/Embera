<?php
/**
 * TestServiceAnimatron.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceAnimatron extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://www.animatron.com/project/a1088356812e5254b05d1023',
            'https://www.animatron.com/project/acd24255d9c69b385efb1c45/',
            'http://www.animatron.com/project/6b893756fd1da93aa77abe74',
            'https://animatron.com/project/06bb635611ad737928c260ce',
            'http://animatron.com/project/c33f8155b859bb1ad1227590',
            'https://www.animatron.com/project/a12f59553432998d2950592f?query=string',
        ),
        'invalid' => array(
            'https://www.animatron.com/',
            'http://www.animatron.com/not/project/6b893756fd1da93aa77abe74',
        ),
    );

    /**
     * @large
     */
    public function testProvider() { $this->validateProvider('Animatron'); }
}

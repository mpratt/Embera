<?php
/**
 * TestServiceInstagram.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceInstagram extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://instagram.com/p/TCg0AoLjoH/#',
            'https://instagram.com/p/Q8fPYGLjtB',
            'http://instagram.com/p/Rqlny2Ljk7/',
            'http://instagr.am/p/TCg0AoLjoH/#',
            'http://instagr.am/p/V8UMy0LjpX',
            'https://instagram.com/p/sdS_ptrDnD/',
            'https://instagram.com/p/5jY1-grDiq/',
        ),
        'invalid' => array(
            'http://instagram.com/stuff/Rqlny2Ljk7/',
            'http://instagram.com/p/Rqlny2Ljk7/other/stuff',
            'http://instagram.com',
            'http://instagr.am',
        ),
        'normalize' => array(
            'http://instagram.com/p/TCg0AoLjoH/#' => 'http://instagram.com/p/TCg0AoLjoH/',
            'http://instagram.com/p/TCg0AoLjoH#' => 'http://instagram.com/p/TCg0AoLjoH',
        )
    );

    public function testProvider() { $this->validateProvider('Instagram'); }
}

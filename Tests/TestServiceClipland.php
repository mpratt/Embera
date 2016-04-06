<?php
/**
 * TestServiceClipland.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceClipland extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.clipland.com/v/4627',
            'http://www.clipland.com/v/6185/',
            'http://clipland.com/v/4902',
            'https://www.clipland.com/v/5158',
        ),
        'invalid' => array(
            'http://www.clipland.com/',
            'http://www.clipland.com/Summary/500001162/',
        ),
    );

    public function testProvider() { $this->validateProvider('Clipland'); }
}
?>

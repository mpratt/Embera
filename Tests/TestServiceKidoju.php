<?php
/**
 * TestServiceKidoju.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceKidoju extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://www.kidoju.com/en/x/57c1c06430c6681900538352/57c1c06530c6681900538353',
            'http://kidoju.com/en/x/5724a45a83e37d190038da9d/58035191011ff80019ea6c85',
        ),
        'invalid' => array(
            'http://kidoju.com/',
            'http://kidoju.com/x/5724a45a83e37d190038da9d/58035191011ff80019ea6c85',
        ),
    );

    public function testProvider() { $this->validateProvider('Kidoju'); }
}
?>

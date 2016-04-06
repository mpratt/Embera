<?php
/**
 * TestServiceStreamOneCloud.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceStreamOneCloud extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://content.streamonecloud.net/embed/account=2zhpQ4DUe5oB/item=OB5psqlNP0MR/tears-of-steel.html'
        ),
        'invalid' => array(
            'https://streamonecloud.net/'
        ),
    );

    /**
     * @large
     */
    public function testProvider() { $this->validateProvider('StreamOneCloud'); }
}
?>

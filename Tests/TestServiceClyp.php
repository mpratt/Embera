<?php
/**
 * TestServiceClyp.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceClyp extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://clyp.it/s43cav2h',
            'http://clyp.it/qtbwbkk0',
            'http://clyp.it/ucknjpgc/',
            'http://clyp.it/playlist/1kmfioze',
            'http://clyp.it/xe5rm1ie',
        ),
        'invalid' => array(
            'http://clyp.it/rebrand',
            'http://clyp.it/ucknjpgc/other/stuff',
            'http://clyp.it/stuff/xe5rm1ie',
        )
    );

    public function testProvider() { $this->validateProvider('Clyp'); }
}

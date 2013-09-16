<?php
/**
 * TestServiceQik.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceQik extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.qik.com/video/26383698',
            'http://qik.com/video/4226370',
            'http://qik.com/video/3698881',
            'http://qik.com/video/2130131'
        ),
        'invalid' => array(
            'http://qik.com/stuff/26383698',
            'http://qik.com/video/a452342b', // Not numeric
            'http://qik.com/video/3698881/other-stuff-here/',
            'http://qik.com/noidea/video/2130131'
        )
    );

    public function testProvider() { $this->validateProvider('Qik'); }
}
?>

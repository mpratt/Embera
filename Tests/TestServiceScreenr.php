<?php
/**
 * TestServiceScreenr.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceScreenr extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.screenr.com/eJvs',
            'http://www.screenr.com/5xfs/',
            'http://screenr.com/mkus',
            'http://www.screenr.com/js0H',
        ),
        'invalid' => array(
            'http://www.screenr.com/',
            'http://www.screenr.com/record',
            'http://www.screenr.com/stream',
            'http://www.screenr.com/help',
            'http://www.screenr.com/T80H/other/stuff',
            'http://www.screenr.com/T80H/other',
        ),
        'fake' => array(
            'type' => 'video',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('Screenr'); }
}

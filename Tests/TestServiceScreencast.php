<?php
/**
 * TestServiceScreencast.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceScreencast extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://screencast.com/users/TechSmith_Media/folders/Camtasia/media/d89af74a-3a32-4c9f-8a85-ef83fdb5c39c',
            'http://www.screencast.com/t/JR3TiP5Dds',
        ),
        'invalid' => array(
            'http://screencast.com/',
            'https://www.screencast.com/signin.aspx',
        ),
    );

    public function testProvider() { $this->validateProvider('Screencast'); }
}
?>

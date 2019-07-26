<?php
/**
 * TestServiceMobyPicture.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceMobyPicture extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.mobypicture.com/user/Henk_Voermans/view/15880044',
            'http://moby.to/89cw01',
            'http://www.mobypicture.com/user/mjjeje_cojjee/view/15880072',
            'http://www.mobypicture.com/user/Chino_Sanchez/view/15880070/',
            'http://mobypicture.com/user/oskrsal71/view/15880066',
            'http://www.mobypicture.com/user/4/view/15877052',
            'http://moby.to/be1e30',
        ),
        'invalid' => array(
            'http://www.mobypicture.com/user/kakhiel2',
            'http://www.mobypicture.com/groups',
            'http://www.mobypicture.com/',
            'http://moby.to/',
            'http://moby.to/other/stuff/',
            'http://mobypicture.com/user/oskrsal71/view/15880066/other/stuff',
        ),
    );

    public function testProvider() { $this->validateProvider('MobyPicture'); }
}

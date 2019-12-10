<?php
/**
 * FaderTest.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Provider;

use Embera\ProviderTester;

/**
 * Test the Fader Provider
 */
final class FaderTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://app.getfader.com/projects/89a73dd0-4926-4f05-a9a8-6896a0a07a71/publish',
            'https://app.getfader.com/projects/d161e83e-35ed-48e1-be70-db69f8ef39e0/publish/',
            'https://app.getfader.com/projects/0c05951f-1eea-4aa6-9a32-1af5323c79ab/publish'
        ),
        'invalid_urls' => array(
            'https://app.getfader.com/projects/0c05951f-1eea-4aa6-9a32-1af5323c79ab/publish/other/stuff',
            'https://app.getfader.com/0c05951f-1eea-4aa6-9a32-1af5323c79ab/publish',
        ),
        'normalize_urls' => array(
            'https://app.getfader.com/projects/0c05951f-1eea-4aa6-9a32-1af5323c79ab/publish/?query=string' => 'https://app.getfader.com/projects/0c05951f-1eea-4aa6-9a32-1af5323c79ab/publish'
        ),
        'fake_response' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('Fader', [ 'width' => 480, 'height' => 270]);
    }
}

<?php
/**
 * YoutubeTest.php
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
 * Test the youtube.com Provider
 */
final class LoomTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://www.loom.com/share/c443100eb66148ed94ce6e25d35f33bb',
            'https://www.loom.com/embed/c443100eb66148ed94ce6e25d35f33bb',
        ),
        'invalid_urls' => array(
            'http://loom.com/',
        ),
        'normalize_urls' => array(
            'https://www.loom.com/embed/c443100eb66148ed94ce6e25d35f33bb' => 'https://www.loom.com/share/c443100eb66148ed94ce6e25d35f33bb',
        ),
        'fake_response' => array(
            'type' => 'video',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('Loom', [ 'width' => 1280, 'height' => 960]);
    }
}

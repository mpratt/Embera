<?php
/**
 * ByzartTest.php
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
 * Test the Byzart Provider
 */
final class ByzartTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://cmc.byzart.eu/files/original/unibo/unibo_bovini_archive/003_010_128627_01.jpg',
            'https://cmc.byzart.eu/files/original/unibo/unibo_bovini_archive/003_010_128626_01.jpg',
        ),
        'invalid_urls' => array(
            'https://cmc.byzart.eu/original/unibo/unibo_bovini_archive/003_010_128626_01.jpg',
            'https://cmc.byzart.eu/',
        ),
        'normalize_urls' => array(
            'http://cmc.byzart.eu/files/original/ouc/ouc_cyprus_broadcasting_corporation/006_014_006448_01.mp4?string' => 'https://cmc.byzart.eu/files/original/ouc/ouc_cyprus_broadcasting_corporation/006_014_006448_01.mp4'
        ),
    );

    public function testProvider()
    {
        $this->validateProvider('Byzart', [ 'width' => 480, 'height' => 270]);
    }
}

<?php
/**
 * ScribdTest.php
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
 * Test the Scribd Provider
 */
final class ScribdTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.scribd.com/document/293634945/Fire-Fuels-and-Streams-The-Effects-and-Effectiveness-of-Riparian-Treatments',
            'https://www.scribd.com/doc/110799637/Synthesis-of-Knowledge-Effects-of-Fire-and-Thinning-Treatments-on-Understory-Vegetation-in-Dry-U-S-Forests',
            'https://www.scribd.com/document/345372585/Data-Hiding-in-Audio-Video-using-Anti-Forensics-Technique-for-Authentication',
        ],
        'invalid_urls' => [
            'https://www.scribd.com/',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Scribd', [ 'width' => 480, 'height' => 270]);
    }
}

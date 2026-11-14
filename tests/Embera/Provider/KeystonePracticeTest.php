<?php
/**
 * KeystonePracticeTest.php
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
 * Test the KeystonePractice Provider
 */
final class KeystonePracticeTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://keystonepractice.co/tools/clinician-net',
        ],
        'invalid_urls' => [
            'https://keystonepractice.co',
            'https://keystonepractice.co/tools',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('KeystonePractice', [ 'width' => 480, 'height' => 270]);
    }
}

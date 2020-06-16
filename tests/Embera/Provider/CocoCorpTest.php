<?php
/**
 * CocoCorpTest.php
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
 * Test the CocoCorp Provider
 */
final class CocoCorpTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://app.ilovecoco.video/m4p4YNGyKR9fmNpgwozX/embed',
        ],
        'invalid_urls' => [
            'https://app.ilovecoco.video',
            'https://app.ilovecoco.video/m4p4YNGyKR9fmNpgwozX',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('CocoCorp', [ 'width' => 480, 'height' => 270]);
    }
}

<?php
/**
 * NoPasteTest.php
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
 * Test the NoPaste Provider
 */
final class NoPasteTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://nopaste.ml/?l=js#XQAAAQAfAAAAAAAAAAAfCAjn2eXL/EQkHNwvz5ZUMLv7U6V3VDuE5C733AY6VA17Vf//8KnAAA=='
        ],
        'invalid_urls' => [
            'https://nopaste.ml/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('NoPaste', [ 'width' => 480, 'height' => 270]);
    }
}

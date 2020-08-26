<?php
/**
 * IssuuTest.php
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
 * Test the Issuu.php Provider
 */
final class IssuuTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://issuu.com/coventrysociety/docs/13---april-2012',
            'https://issuu.com/somosbelcorp/docs/esika.colombia.c06.2019',
        ],
        'invalid_urls' => [
            'https://issuu.com/moncheribridals/',
            'https://issuu.com/moncheribridals/docs/',
            'https://issuu.com/moncheribridals/docs/219colettenoprice/other-stuff',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<div'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Issuu', [ 'width' => 480, 'height' => 270]);
    }
}

<?php
/**
 * KooappTest.php
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
 * Test the Kooapp Provider
 */
final class KooappTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.kooapp.com/koo/Dev_Fadnavis/5b9dded4-02ce-47af-a9fc-6ab8272f67d8',
        ],
        'invalid_urls' => [
            'https://www.kooapp.com/',
            'https://www.kooapp.com/Dev_Fadnavis/5b9dded4-02ce-47af-a9fc-6ab8272f67d8',
        ],
    ];

    public function testProvider()
    {
        $this->markTestSkipped('Kooapp is having issues with their oembed endpoint');
        //$this->validateProvider('Kooapp', [ 'width' => 480, 'height' => 270]);
    }
}

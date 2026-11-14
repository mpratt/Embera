<?php
/**
 * LeagueMakerAppTest.php
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
 * Test the LeagueMakerApp Provider
 */
final class LeagueMakerAppTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://leaguemakerapp.com/competitions/la-liga-2024-25',
            'https://leaguemakerapp.com/es/competitions/la-liga-2024-25/standings',
        ],
        'invalid_urls' => [
            'https://leaguemakerapp.com',
            'https://leaguemakerapp.com/competitions',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('LeagueMakerApp', [ 'width' => 480, 'height' => 270]);
    }
}

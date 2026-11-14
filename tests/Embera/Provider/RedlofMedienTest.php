<?php
/**
 * RedlofMedienTest.php
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
 * Test the RedlofMedien Provider
 */
final class RedlofMedienTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://redlof-medien.de/agentur/',
            'https://show.wexcreator.com/demo/',
        ],
        'invalid_urls' => [
            'https://redlof-medien.de',
            'https://show.wexcreator.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('RedlofMedien', [ 'width' => 480, 'height' => 270]);
    }
}

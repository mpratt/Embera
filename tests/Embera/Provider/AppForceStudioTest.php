<?php
/**
 * AppForceStudioTest.php
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
 * Test the AppForceStudio Provider
 */
final class AppForceStudioTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://appforcestudio.com/playground/-Oaty4XzTiGzSdRkIRDZ',
        ],
        'invalid_urls' => [
            'https://appforcestudio.com',
            'https://appforcestudio.com/playground',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('AppForceStudio', [ 'width' => 480, 'height' => 270]);
    }
}

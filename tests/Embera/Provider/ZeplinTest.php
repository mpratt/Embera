<?php
/**
 * ZeplinTest.php
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
 * Test the Zeplin Provider
 */
final class ZeplinTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://app.zeplin.io/project/5cdb386641eeab347e3f4d06/styleguide/components?coid=5cd3731e20f8ff5736db476',
            'https://app.zeplin.io/project/5cdb386641eeab347e3f4d06/screen/5cdb3876201cf7684bbeebb9/version/5cdb3876201cf7684bbeebba',
            'https://app.zeplin.io/project/5cdb386641eeab347e3f4d06/screen/5cdb3876201cf7684bbeebb9',
        ],
        'invalid_urls' => [
            'https://app.zeplin.io/project',
            'https://app.zeplin.io/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Zeplin', [ 'width' => 480, 'height' => 270]);
    }
}

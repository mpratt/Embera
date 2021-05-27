<?php
/**
 * LibsynTest.php
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
 * Test the Libsyn Provider
 */
final class LibsynTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://theambitiousvet.libsyn.com/139-connecting-health-and-social-care-inside-local-communities-with-army-veteran-taylor-justice',
            'https://moviecrypt.libsyn.com/ep-416-william-brent-bell',
        ],
        'invalid_urls' => [
            'https://libsyn.com',
            'https://libsyn.com/plans-and-pricing/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Libsyn', [ 'width' => 480, 'height' => 270]);
    }
}

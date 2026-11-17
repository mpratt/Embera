<?php
/**
 * JawafdehiTest.php
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
 * Test the Jawafdehi Provider
 */
final class JawafdehiTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://jawafdehi.org/case/giribandhu-tea-estate-land-swap',
            'https://jawafdehi.org/case/budhigandaki-hydropower-projec-77f597',
        ],
        'invalid_urls' => [
            'https://jawafdehi.org',
            'https://jawafdehi.org/case',
            'https://jawafdehi.org/about',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Jawafdehi', [ 'width' => 480, 'height' => 270]);
    }
}

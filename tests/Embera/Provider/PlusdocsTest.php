<?php
/**
 * PlusdocsTest.php
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
 * Test the Plusdocs Provider
 */
final class PlusdocsTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://app.plusdocs.com/test/pages/edit/cl283huj1094009l1wmdxnzcf',
        ],
        'invalid_urls' => [
            'https://app.plusdocs.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Plusdocs', [ 'width' => 480, 'height' => 270]);
    }
}

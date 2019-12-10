<?php
/**
 * StandfordDigitalRepositoryTest.php
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
 * Test the StandfordDigitalRepository Provider
 */
final class StandfordDigitalRepositoryTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://purl.stanford.edu/bb112zx3193',
            'https://purl.stanford.edu/py305sy7961',
        ],
        'invalid_urls' => [
            'https://purl.stanford.edu/',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('StandfordDigitalRepository', [ 'width' => 480, 'height' => 270]);
    }
}

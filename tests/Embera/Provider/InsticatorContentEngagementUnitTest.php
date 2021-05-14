<?php
/**
 * InsticatorContentEngagementUnitTest.php
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
 * Test the InsticatorContentEngagementUnit Provider
 */
final class InsticatorContentEngagementUnitTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://ppa.insticator.com/embed-unit/b4a63625-f223-4d97-9385-a34f734c98dc',
            'https://ppa.insticator.com/embed-unit/6b5eac07-18e8-4ecb-90e1-a76091b56d10',
        ],
        'invalid_urls' => [
            'https://ppa.insticator.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('InsticatorContentEngagementUnit', [ 'width' => 480, 'height' => 270]);
    }
}

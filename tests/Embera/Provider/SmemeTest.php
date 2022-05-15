<?php
/**
 * SmemeTest.php
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
 * Test the Smeme Provider
 */
final class SmemeTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://open.smeme.com/embed/2ac17338-f447-4c99-b578-bd145c09c60b',
        ],
        'invalid_urls' => [
            'https://open.smeme.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Smeme', [ 'width' => 480, 'height' => 270]);
    }
}

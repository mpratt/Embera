<?php
/**
 * InfogramTest.php
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
 * Test the Infogram Provider
 */
final class InfogramTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://infogram.com/amazon-and-the-book-market-1gk9vp1xj86lm4y',
            'http://infogram.com/welcome_welcome_your_first_project-939?no_track=true',
            'https://infogram.com/8f6d71e6-5ce4-4840-a19d-7cc83cfb8a5f',
        ],
        'invalid_urls' => [
            'https://infogram.com/',
            'https://infogram.com/text/other-text',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Infogram', [ 'width' => 480, 'height' => 270]);
    }
}

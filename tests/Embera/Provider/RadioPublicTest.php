<?php
/**
 * RadioPublicTest.php
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
 * Test the RadioPublic Provider
 */
final class RadioPublicTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://radiopublic.com/yarn-a-story-podcast-6LMVDv:RXhwbG9yZQ',
            'https://radiopublic.com/wild-thing-6rOYdN:RXhwbG9yZQge/s1!9be20',
            'https://radiopublic.com/the-bucket-podcast-WD03oE:RXhwbG9yZQ/s1!d8d93'
        ],
        'invalid_urls' => [
            'https://radiopublic.com/',
            'https://radiopublic.com/explore',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('RadioPublic', [ 'width' => 480, 'height' => 270]);
    }
}

<?php
/**
 * PolldaddyTest.php
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
 * Test the Polldaddy Provider
 */
final class PolldaddyTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'http://theguy1979.polldaddy.com/s/growing-up-biracial-in-america-being-of-mixed-race-descent-in-2013',
            'http://polldaddy.com/poll/7012505/',
            'http://polldaddy.com/s/ADF2AB9E60258D2A/',
        ],
        'invalid_urls' => [
            'https://polldaddy.com/',
            'https://polldaddy.com/poll/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Polldaddy', [ 'width' => 480, 'height' => 270]);
    }
}

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
            'https://taripardoly.survey.fm/pph-badan',
            'https://poll.fm/6088289',
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

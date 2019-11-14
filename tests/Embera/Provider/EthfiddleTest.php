<?php
/**
 * EthfiddleTest.php
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
 * Test the Ethfiddle Provider
 */
final class EthfiddleTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://ethfiddle.com/Y8Iy49zDJ0',
        ),
        'invalid_urls' => array(
            'https://ethfiddle.com/',
        ),
        'normalize_urls' => array(
            'http://ethfiddle.com/Y8Iy49zDJ0?1=string' => 'https://ethfiddle.com/Y8Iy49zDJ0',
        ),
        'fake_response' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('Ethfiddle', [ 'width' => 480, 'height' => 270]);
    }
}

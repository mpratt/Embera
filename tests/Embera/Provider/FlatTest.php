<?php
/**
 * FlatTest.php
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
 * Test the Flat Provider
 */
final class FlatTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://flat.io/score/5bb008d9888e140d3e3a6cec-perpetuoso',
            'https://flat.io/score/5af9db3cb41bc91eceb9fc2c-seventeen',
            'https://flat.io/score/589cc993d5b6cdd6516ddbcd',
        ),
        'invalid_urls' => array(
            'https://flat.io/',
            'https://flat.io/score/',
        ),
        'normalize_urls' => array(
            'http://flat.io/score/5af9db3cb41bc91eceb9fc2c-seventeen?query=string' => 'https://flat.io/score/5af9db3cb41bc91eceb9fc2c-seventeen',
        ),
        'fake_response' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('Flat', [ 'width' => 480, 'height' => 270]);
    }
}

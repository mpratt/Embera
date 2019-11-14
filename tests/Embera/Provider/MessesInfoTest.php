<?php
/**
 * MessesInfoTest.php
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
 * Test the MessesInfo Provider
 */
final class MessesInfoTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://messes.info/lieu/75/paris-19/saint-jean-baptiste-de-belleville',
            'https://messes.info/horaires/47.40893185:-0.6189471%20.FR%2049',
            'https://messes.info/lieu/49/angers/sainte-bernadette',
        ),
        'invalid_urls' => array(
            'https://messes.info/',
        ),
        'normalize_urls' => array(
            'http://messes.info/lieu/75/paris-19/saint-jean-baptiste-de-belleville?query=string' => 'https://messes.info/lieu/75/paris-19/saint-jean-baptiste-de-belleville',
        ),
    );

    public function testProvider()
    {
        $this->validateProvider('MessesInfo', [ 'width' => 480, 'height' => 270]);
    }
}

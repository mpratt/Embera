<?php
/**
 * DigitekaTest.php
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
 * Test the Digiteka Provider
 */
final class DigitekaTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://www.ultimedia.com/default/index/videogeneric/id/pux853',
            'https://www.ultimedia.com/default/index/videogeneric/id/plls8q',
        ),
        'invalid_urls' => array(
            'https://www.ultimedia.com/',
            'https://www.ultimedia.com/default/index/videogeneric/id/'
        ),
        'normalize_urls' => array(
            'http://ultimedia.com/default/index/videogeneric/id/pux853?query=string' => 'https://www.ultimedia.com/default/index/videogeneric/id/pux853',
        ),
    );

    public function testProvider()
    {
        $this->validateProvider('Digiteka', [ 'width' => 480, 'height' => 270]);
    }
}

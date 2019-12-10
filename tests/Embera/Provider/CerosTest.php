<?php
/**
 * CerosTest.php
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
 * Test the Ceros Provider
 */
final class CerosTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://view.ceros.com/ceros-inspire/fendi-desktop-4',
            'https://view.ceros.com/ceros/new-experience-3',
        ),
        'invalid_urls' => array(
            'https://view.ceros.com'
        ),
        'normalize_urls' => array(
            'http://view.ceros.com/ceros/new-experience-3?overrideHeight=400' => 'https://view.ceros.com/ceros/new-experience-3',
        ),
    );

    public function testProvider()
    {
        $this->validateProvider('Ceros', [ 'width' => 480, 'height' => 270]);
    }
}

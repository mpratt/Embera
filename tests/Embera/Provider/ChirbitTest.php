<?php
/**
 * ChirbitTest.php
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
 * Test the chirbit.com Provider
 */
final class ChirbitTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'http://chirb.it/w3gGKr',
            'https://chirb.it/wtJs5e/',
            'http://www.chirb.it/zGt9tG',
        ),
        'invalid_urls' => array(
            'https://chirbit.it/top-50-chirbits-this-week.php',
            'https://chirb.it',
        ),
        'normalize_urls' => array(
            'http://chirb.it/wtJs5e/?query=string' => 'https://chirb.it/wtJs5e',
        ),
        'fake_response' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('Chirbit', [ 'width' => 480, 'height' => 270]);
    }
}

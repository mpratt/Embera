<?php
/**
 * ClypTest.php
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
 * Test the Clyp Provider
 */
final class ClypTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'http://clyp.it/s43cav2h',
            'https://clyp.it/zl5edmpl',
            'http://clyp.it/xe5rm1ie',
        ),
        'invalid_urls' => array(
            'http://clyp.it/ucknjpgc/other/stuff',
            'http://clyp.it/stuff/xe5rm1ie',
        ),
        'normalize_urls' => array(
            'http://clyp.it/1kmfioze/' => 'https://clyp.it/1kmfioze',
            'http://clyp.it/playlist/1kmfioze' => 'https://clyp.it/playlist/1kmfioze',
        ),
    );

    public function testProvider()
    {
        $this->validateProvider('Clyp', [ 'width' => 480, 'height' => 270]);
    }
}

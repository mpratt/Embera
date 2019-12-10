<?php
/**
 * EyrieTest.php
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
 * Test the Eyrie Provider
 */
final class EyrieTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://eyrie.io/board/747d351c00bc4f91ae7b95635942e685',
            'https://eyrie.io/board/747d351c00bc4f91ae7b95635942e685/?pours=true&active=layout&layers=m20007ba000068&sheet=0&x=15000&y=25000&w=96037&h=55000&flipped=false'
        ),
        'invalid_urls' => array(
            'https://eyrie.io/',
            'https://eyrie.io/stuff/747d351c00bc4f91ae7b95635942e685',
        ),
        'normalize_urls' => array(
            'http://eyrie.io/board/747d351c00bc4f91ae7b95635942e685/' => 'https://eyrie.io/board/747d351c00bc4f91ae7b95635942e685',
        ),
    );

    public function testProvider()
    {
        $this->validateProvider('Eyrie', [ 'width' => 480, 'height' => 270]);
    }
}

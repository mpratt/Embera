<?php
/**
 * RcvisTest.php
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
 * Test the Rcvis Provider
 */
final class RcvisTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://rcvis.com/v/macomb-multiwinner-surplusjson-3',
            'https://rcvis.com/v/opavote2json',
        ],
        'invalid_urls' => [
            'https://rcvis.com/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Rcvis', [ 'width' => 480, 'height' => 270]);
    }
}

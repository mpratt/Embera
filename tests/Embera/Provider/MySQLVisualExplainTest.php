<?php
/**
 * MySQLVisualExplainTest.php
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
 * Test the MySQLVisualExplain Provider
 */
final class MySQLVisualExplainTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://mysqlexplain.com/explain/01j2ef1bj7efr97m5v140rnxyz',
        ],
        'invalid_urls' => [
            'https://mysqlexplain.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('MySQLVisualExplain', [ 'width' => 480, 'height' => 270]);
    }
}

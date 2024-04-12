<?php
/**
 * NeetoRecordTest.php
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
 * Test the NeetoRecord Provider
 */
final class NeetoRecordTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://spinkart.neetorecord.com/watch/ade154fb-bff3-4347-b2fa-be77db58e792',
        ],
        'invalid_urls' => [
            'https://spinkart.neetorecord.com',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('NeetoRecord', [ 'width' => 480, 'height' => 270]);
    }
}

<?php
/**
 * CacheAdapterTest.php
 *
 * @package Tests
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Embera\Cache;

use PHPUnit\Framework\TestCase;

class CacheAdapterTest extends TestCase
{
    public function testSetAndGetMultipleCacheItemsWithFileSystem()
    {
        $cache = new Filesystem(sys_get_temp_dir(), mt_rand(1, 5));
        $cache->clear();

        $data = [
            'data_1' => md5(mt_rand(1000, 9000)),
            'data_2' => md5(mt_rand(1000, 9000)),
            'data_3' => md5(mt_rand(1000, 9000)),
            'data_4' => md5(mt_rand(1000, 9000)),
        ];

        $this->assertTrue($cache->setMultiple($data, 10));

        $returnedData = $cache->getMultiple(array_merge(['data_5', 'data_6'], array_keys($data)), 'default value');

        foreach ($data as $k => $v) {
            $this->assertEquals($v, $returnedData[$k]);
        }

        foreach (['data_5', 'data_6'] as $k) {
            $this->assertEquals('default value', $returnedData[$k]);
        }

        $this->assertTrue($cache->deleteMultiple(array_keys($data)));
    }

}

<?php
/**
 * FilesystemTest.php
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

use DateTime;
use DateInterval;

class FilesystemTest extends TestCase
{
    public function testCanStoreStringsArraysAndObjects()
    {
        $cache = new Filesystem(sys_get_temp_dir(), mt_rand(1, 5));
        $cache->clear();

        $data = [ md5(mt_rand(1000, 9000)), sha1(mt_rand(1000, 9000)), mt_rand(1000, 9000), 'This is a string! ? \' 345 345 sdf # @ $ % & *'];

        $this->assertTrue($cache->set('array', $data));
        $this->assertEquals($cache->get('array'), $data);

        $this->assertTrue($cache->set('object', (object) $data));
        $this->assertEquals($cache->get('object'), (object) $data);

        $this->assertTrue($cache->set('string', end($data)));
        $this->assertEquals($cache->get('string'), end($data));
    }

    public function testBehaviourOnOverwrite()
    {
        $cache = new Filesystem(sys_get_temp_dir(), mt_rand(1, 5));
        $this->assertTrue($cache->set('twice', 'this is the first string', 5));
        $this->assertTrue($cache->set('twice', 'This is the second string', 2));
        $this->assertEquals($cache->get('twice'), 'This is the second string');
    }

    public function testNonExistantKeys()
    {
        $cache = new Filesystem(sys_get_temp_dir(), mt_rand(1, 5));
        $this->assertNull($cache->get('unknown_key'));
    }

    public function testCacheDuration()
    {
        $expirationDate = new DateTime('Now');
        $expirationDate->add(new DateInterval('PT2S'));

        $cache = new Filesystem(sys_get_temp_dir(), mt_rand(1, 5));
        $this->assertTrue($cache->set('test_duration', 'dummy data', $expirationDate));
        sleep(4);

        $this->assertNull($cache->get('test_duration'));
    }

    public function testDeleteCache()
    {
        $cache = new Filesystem(sys_get_temp_dir(), mt_rand(1, 5));

        $this->assertTrue($cache->set('deleted_key', 'dummy data'));
        $this->assertTrue($cache->has('deleted_key'));
        $this->assertTrue($cache->delete('deleted_key'));
        $this->assertNull($cache->get('deleted_key'));
        $this->assertFalse($cache->has('deleted_key'));
        $this->assertFalse($cache->delete('deleted_key'));
    }

    public function testEnabledConditions()
    {
        $cache = new Filesystem('/path/unknown/' . mt_rand(0,5000), 1);
        $this->assertFalse($cache->isEnabled());

        $cache = new Filesystem(sys_get_temp_dir(), 1);
        $cache->set('enable_test', 'dummy_data_1');
        $this->assertTrue($cache->has('enable_test'));
        $this->assertEquals($cache->get('enable_test'), 'dummy_data_1');
        $this->assertTrue($cache->delete('enable_test'));

        $cache->disable();
        $this->assertFalse($cache->isEnabled());
        $cache->set('enable_test', 'dummy_data_1');
        $this->assertFalse($cache->has('enable_test'));
        $this->assertNull($cache->get('enable_test'));
        $this->assertFalse($cache->delete('enable_test'));
        $this->assertFalse($cache->clear());

        $cache->enable();
        $cache->set('enable_test', 'dummy_data_1');
        $this->assertTrue($cache->has('enable_test'));
        $this->assertEquals($cache->get('enable_test'), 'dummy_data_1');
        $this->assertTrue($cache->delete('enable_test'));
    }

    public function testClearCache()
    {
        $cache = new Filesystem(sys_get_temp_dir(), 1);
        $cache->set('clear_1', 'dummy_data_1');
        $cache->set('clear_2', 'dummy_data_2');
        $cache->set('clear_3', 'dummy_data_3');

        $this->assertEquals($cache->get('clear_1'), 'dummy_data_1');
        $this->assertEquals($cache->get('clear_2'), 'dummy_data_2');
        $this->assertEquals($cache->get('clear_3'), 'dummy_data_3');

        $this->assertTrue($cache->clear());

        $this->assertEquals($cache->get('clear_1'), null);
        $this->assertEquals($cache->get('clear_2'), null);
        $this->assertEquals($cache->get('clear_3'), null);
    }

}

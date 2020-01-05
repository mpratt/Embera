<?php
/**
 * Filesystem.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Cache;

use DateTimeInterface;

/**
 * Simple Cache Class that stores information in the
 * filesystem.
 */
class Filesystem extends CacheAdapter implements CacheInterface
{
    /** @var string $path where the cache is being stored */
    protected $path;

    /** @var int $ttl Duration of the cache in seconds */
    protected $ttl = 0;

    /** @var bool Wether the cache is enabled or not */
    protected $enabled = true;

    /**
     * Construct
     *
     * @param string $path
     * @param int $ttl
     * @return void
     */
    public function __construct($path, $ttl)
    {
        $this->ttl = (int) $ttl;
        if (!is_dir($path) || !is_writable($path)) {
            $this->enabled = false;
        } else {
            $this->path = $path;
        }
    }

    /**
     * Enable this engine
     *
     * @return void
     */
    public function enable()
    {
        $this->enabled = true;
    }

    /**
     * Disable this engine
     *
     * @return void
     */
    public function disable()
    {
        $this->enabled = false;
    }

    /**
     * Disable this engine
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /** inline {@inheritdoc} */
    public function get($key, $default = null)
    {
        if (!$this->enabled) {
            return $default;
        }

        $file = $this->getTargetFile($key);
        if (file_exists($file)) {
            $data = unserialize(file_get_contents($file));

            if ($data['expire_time'] <= time()) {
                $this->delete($key);
                return $default;
            }

            return $data['content'];
        }

        return $default;
    }

    /** inline {@inheritdoc} */
    public function set($key, $value, $ttl = null)
    {
        if (!$this->enabled) {
            return false;
        }

        $expiration = $this->calculateExpiration($ttl);
        $createFile = file_put_contents($this->getTargetFile($key), serialize([
            'expire_time' => (int) $expiration,
            'expire_time_date' => date('Y-m-d H:i:s', $expiration),
            'created' => date('Y-m-d H:i:s'),
            'content'  => $value,
        ]), LOCK_EX);

        return ($createFile !== false && $createFile > 0);
    }

    /** inline {@inheritdoc} */
    public function delete($key)
    {
        if (!$this->enabled) {
            return false;
        }

        $file = $this->getTargetFile($key);
        if (file_exists($file)) {
            @unlink($file);
            return true;
        }

        return false;
    }

    /** inline {@inheritdoc} */
    public function clear()
    {
        if (!$this->enabled) {
            return false;
        }

        $pattern = rtrim($this->path, '/') . '/embera-*.cache';
        if ($list = glob($pattern)) {
            foreach ($list as $file) {
                @unlink($file);
            }
        }

        return true;
    }

    /** inline {@inheritdoc} */
    public function has($key)
    {
        if (!$this->enabled) {
            return false;
        }

        $file = $this->getTargetFile($key);
        return (file_exists($file));
    }

    /**
     * Calculates the expiration date of a cache item,
     * based on the given $ttl
     *
     * @param int|\DateTime $ttl
     * @return int
     */
    protected function calculateExpiration($ttl = null)
    {
        if (is_numeric($ttl))
            return (time() + $ttl);
        else if ($ttl instanceof DateTimeInterface)
            return $ttl->getTimestamp();
        else
            return (time() + $this->ttl);
    }

    /**
     * Generates the filename for the given $key
     *
     * @param string $key
     * @return string
     */
    protected function getTargetFile($key)
    {
        return rtrim($this->path, '/') . '/embera-' . md5($key) . '.cache';
    }

}

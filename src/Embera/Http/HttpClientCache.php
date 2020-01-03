<?php
/**
 * HttpClientCache.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Http;

use Embera\Cache\CacheInterface;

/**
 * This Class is a Decorator of the HttpClient Class.
 * Its main use is to wrap The Cache Class outside of the
 * response.
 */
class HttpClientCache implements HttpClientInterface
{
    /** @var HttpClientInterface */
    protected $httpClient;

    /** @var CacheInterface */
    protected $cachingEngine;

    /**
     * Construct
     *
     * @param HttpClientInterface $httpClient
     * @return void
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Sets the Caching Engine
     *
     * @param CacheInterface $engine
     * @return void
     */
    public function setCachingEngine(CacheInterface $engine)
    {
        $this->cachingEngine = $engine;
    }

    /** inline {@inheritdoc} */
    public function setConfig(array $config = [])
    {
        $this->httpClient->setConfig($config);
    }

    /** inline {@inheritdoc} */
    public function fetch($url, array $params = [])
    {
        $key = md5(serialize([ 'url' => $url, 'params' => $params ]));
        if ($cachedResponse = $this->cachingEngine->get($key)) {
            return $cachedResponse;
        }

        try {

            if ($response = $this->httpClient->fetch($url, $params)) {
                $this->cachingEngine->set($key, $response);
                return $response;
            }

        } catch (\Exception $e) {}

        return false;
    }

}

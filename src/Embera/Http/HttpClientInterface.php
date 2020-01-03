<?php
/**
 * HttpClientInterface.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Http;

/**
 * This class is in charge of doing http requests. Its a very minimal
 * wrapper for curl or file_get_contents
 */
interface HttpClientInterface
{
    /**
     * Sets the configuration array for this object
     *
     * @param array $config
     * @return void
     */
    public function setConfig(array $config = []);

    /**
     * Executes http requests
     *
     * @param string $url
     * @param array $params Additional parameters for the respective part
     * @return string
     *
     * @throws \Exception when an error ocurred or if no way to do a request exists
     */
    public function fetch($url, array $params = []);

}

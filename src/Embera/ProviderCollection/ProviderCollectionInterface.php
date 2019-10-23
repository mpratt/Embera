<?php
/**
 * ProviderCollectionInterface.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\ProviderCollection;

/**
 * Interface used by Providercollections
 */
interface ProviderCollectionInterface
{
    /**
     * Sets the configuration array for this object
     *
     * @param array $config  Associative array with configuration options
     * @return void
     */
    public function setConfig(array $config = []);

    /**
     * Adds a new Provider into the provider map
     *
     * @param string $host The host for the map
     * @param string|object $class The class or object that should manage the provider
     * @return void
     */
    public function addProvider($host, $class);

    /**
     * Filters a provider from the provider list based on the provider name
     *
     * @param string|callable $providerName The name of the provider or a callable function
     * @return void
     */
    public function filter($providerName);

    /**
     * Returns an array with providers found.
     *
     * @param array|string $urls  An array with urls or a string with urls
     * @return array
     */
    public function findProviders($data);
}

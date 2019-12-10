<?php
/**
 * CustomProviderCollection.php
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
 * Custom provider Collection, used for when you want to create a
 * provider collection from scratch. You can instantiate this class
 * and register providers manually, depending on your usage.
 *
 * For example:
 *
 * $provider = new CustomProviderCollection($config);
 * $provider->registerProvider('Youtube');
 * $provider->registerProvider('Vimeo');
 * $provider->registerProvider('Instagram');
 *
 */
class CustomProviderCollection extends ProviderCollectionAdapter
{
    /** inline {@inheritdoc} */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }
}

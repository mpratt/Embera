<?php
/**
 * GeographCI.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Provider;

/**
 * GeographCI Provider
 * No description.
 *
 * @link https://channel-islands.geograph.org/
 *
 */
class GeographCI extends GeographUk
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.geograph.org.gg/api/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.geograph.org.gg', '*.geograph.org.je',  'channel-islands.geograph.org',
        'channel-islands.geographs.org', '*.channel.geographs.org'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;
}

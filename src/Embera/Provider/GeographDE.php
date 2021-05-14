<?php
/**
 * GeographDE.php
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
 * GeographDE Provider
 * Geograph is a web based project to collect and reference geographically representative images o...
 *
 * @link https://geo-en.hlipp.de/
 *
 */
class GeographDE extends GeographUk
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://geo.hlipp.de/restapi.php/api/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        '*.hlipp.de', 'germany.geograph.org'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;
}

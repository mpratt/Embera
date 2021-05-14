<?php
/**
 * LearningApps.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Provider;

use Embera\Url;

/**
 * LearningApps Provider
 * LearningApps.org - interaktive und multimediale Lernbausteine
 *
 * @link https://learningapps.org
 *
 */
class LearningApps extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://learningapps.org/oembed.php?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'learningapps.org'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~learningapps\.org/(view)?([0-9]+)$~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();
        $url->removeLastSlash();

        return $url;
    }

    /** inline {@inheritdoc} */
    public function modifyResponse(array $response = [])
    {
        if (!empty($response['html'])) {
            $response['html'] = str_replace('http://', 'https://', $response['html']);
        }

        return $response;
    }

}

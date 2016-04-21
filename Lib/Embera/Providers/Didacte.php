<?php
/**
 * Didacte.php
 *
 * @package Providers
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Providers;

/**
 * The didacte.com Provider
 * @link http://didacte.com
 */
class Didacte extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://{m}.didacte.com/cards/oembed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return preg_match('~didacte\.com/a/course/(:?[^ ]+)$~i', $this->url);
    }

    /**
     * inline {@inheritdoc}
     *
     * Im overriding this method because the oembed endpoint
     * depends on the subdomain of the oembed response.
     */
    public function getInfo()
    {
        preg_match('~//([^ ]+)\.didacte\.com/a/course/~i', $this->url, $m);
        $this->apiUrl = str_replace('{m}', $m['1'], $this->apiUrl);
        return parent::getInfo();
    }
}

?>

<?php
/**
 * IFixIt.php
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
 * The ifixit.com Provider
 * @link http://www.ifixit.com/api/doc/embed
 * TODO: Candidate for Fake support
 */
class IFixIt extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'http://www.ifixit.com/Embed?format=json';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        return (preg_match('~ifixit\.com/(?:Guide|Teardown)/(?:[\w\d\+ %]+)/(?:[\d/]+)/?$~i', $this->url));
    }
}

?>

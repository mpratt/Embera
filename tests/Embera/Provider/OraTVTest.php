<?php
/**
 * OraTVTest.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Provider;

use Embera\ProviderTester;

/**
 * Test the OraTV Provider
 */
final class OraTVTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'http://www.ora.tv/politicking/2019/7/17/richard-painter-discusses-donald-trumps-big-win-in-an-emoluments-clause-lawsuit-0_34y8a1jn4y95',
            'http://www.ora.tv/politicking/2019/7/9/john-carlos-frey-trump-administration-has-put-americas-immigration-policy-on-steroids-0_70gwkwi22wut',
            'http://www.ora.tv/politicking/2019/5/30/ralph-nader-joe-biden-is-hillary-clinton-redux-0_1ocsck09bq45',
        ],
        'invalid_urls' => [
            'http://www.ora.tv/',
            'http://www.ora.tv/politicking/2019/5/30/ralph-nader-joe-biden-is-hillary-clinton-redux-',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('OraTV', [ 'width' => 480, 'height' => 270]);
    }
}

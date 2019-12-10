<?php
/**
 * NfbTest.php
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
 * Test the Nfb Provider
 */
final class NfbTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.nfb.ca/playlist/five50/?docs-hp_en=feature_2&feature_type=playlist&banner_id=79142',
            'https://www.nfb.ca/film/girls-of-meru/?docs-hp_en=feature_3&feature_type=w_free-film&banner_id=79141',
            'https://www.nfb.ca/film/mabel/',
        ],
        'invalid_urls' => [
            'https://www.nfb.ca/',
            'https://www.nfb.ca/film/',
            'https://www.nfb.ca/film/mabel/other-stuff',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Nfb', [ 'width' => 480, 'height' => 270]);
    }
}

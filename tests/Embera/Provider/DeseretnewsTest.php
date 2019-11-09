<?php
/**
 * DeseretnewsTest.php
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
 * Test the Deseretnews Provider
 */
final class DeseretnewsTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://graphics.deseretnews.com/american-family-survey/iframe/race-and-personal-identity',
            'http://graphics.deseret.com/american-family-survey/what-is-considered-harassment?query=string',
            'https://graphics.deseret.com/american-family-survey/iframe/experiences-with-sexual-harassment',
            'http://graphics.deseret.com/american-family-survey/personal-identity-in-america',
        ),
        'invalid_urls' => array(
            'http://graphics.deseret.com/american-family-survey/what-is-considered-harassment/other-stuff',
        ),
        'normalize_urls' => array(
            'http://graphics.deseretnews.com/american-family-survey/what-is-considered-harassment/?query=string' => 'https://graphics.deseretnews.com/american-family-survey/what-is-considered-harassment',
            'http://graphics.deseret.com/american-family-survey/iframe/race-and-personal-identity' => 'https://graphics.deseret.com/american-family-survey/iframe/race-and-personal-identity',

        ),
    );

    public function testProvider()
    {
        $this->validateProvider('Deseretnews', [ 'width' => 480, 'height' => 270]);
    }
}

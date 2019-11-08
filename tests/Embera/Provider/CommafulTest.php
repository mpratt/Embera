<?php
/**
 * CommafulTest.php
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
 * Test the commaful.com Provider
 */
final class CommafulTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'http://commaful.com/play/artizi/kimberly--tommy/',
            'https://commaful.com/play/wethedreamers/to-the-one-who-loves-him-next/',
            'http://www.commaful.com/play/dissonance/darling-wont-you-feel-human-with-me/'
        ),
        'invalid_urls' => array(
            'https://commaful.com',
            'https://commaful.com/play/wethedreamers/to-the-one-who-loves-him-next/other-stuff',
        ),
        'normalize_urls' => array(
            'http://www.commaful.com/play/wethedreamers/to-the-one-who-loves-him-next/?stuff=stinf' => 'https://commaful.com/play/wethedreamers/to-the-one-who-loves-him-next/',
        ),
        'fake_response' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('Commaful', [ 'width' => 480, 'height' => 270]);
    }
}

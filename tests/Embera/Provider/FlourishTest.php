<?php
/**
 * FlourishTest.php
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
 * Test the Flourish Provider
 */
final class FlourishTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://public.flourish.studio/visualisation/47988/',
            'https://public.flourish.studio/story/47988/',
            'https://public.flourish.studio/story/10714/',
            'https://public.flourish.studio/visualisation/36321/'
        ),
        'invalid_urls' => array(
            'https://flourish.studio/'
        ),
        'normalize_urls' => array(
            'http://public.flourish.studio/story/47988/?query=string' => 'https://public.flourish.studio/story/47988',
        ),
        'fake_response' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('Flourish', [ 'width' => 480, 'height' => 270]);
    }
}

<?php
/**
 * ButtondownTest.php
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
 * Test the Buttondown Provider
 */
final class ButtondownTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://buttondown.email/rhcpsessions?as_embed=true',
            'https://www.buttondown.email/jmduke',
        ),
        'invalid_urls' => array(
            'https://buttondown.email/multiple/paths',
            'https://buttondown.email/',
        ),
        'normalize_urls' => array(
            'https://www.buttondown.email/jmduke/?query=string' => 'https://buttondown.email/jmduke',
        ),
        'fake_response' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('Buttondown', [ 'width' => 480, 'height' => 270]);
    }
}

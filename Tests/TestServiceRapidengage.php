<?php
/**
 * TestServiceRapidengage.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceRapidengage extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://rapidengage.com/s/6b1faa05',
            'https://www.rapidengage.com/s/6b1faa05',
            'http://www.rapidengage.com/s/6b1faa05/'
        ),
        'invalid' => array(
            'https://rapidengage.com/s/6b1faa05/other-stuff',
            'https://rapidengage.com/developer/docs#oembed',
            'https://rapidengage.com/live/demo',
            'http://rapidengage.com/'
        ),
    );

    public function testProvider() { $this->validateProvider('Rapidengage'); }
}

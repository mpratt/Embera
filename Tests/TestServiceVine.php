<?php
/**
 * TestServiceVine.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceVine extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://vine.co/v/OZQ61X9KWwB',
            'https://vine.co/v/OzPtPEPOwVI/',
            'http://vine.co/v/MEDKjeFnx2B',
            'http://vine.co/v/MUq1itKiPhQ/',
        ),
        'invalid' => array(
            'https://vine.co/editors-picks',
            'http://vine.co/v/MUq1itKiPhQ/other-stuff',
            'https://vine.co/search/asdas',
        ),
        'fake' => array(
            'type' => 'video',
            'html' => '<iframe'
        )
    );

    /**
     * @large
     */
    public function testProvider()
    {
        $this->validateProvider('Vine');
    }
}
?>

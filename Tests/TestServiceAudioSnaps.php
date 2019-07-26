<?php
/**
 * TestServiceAudioSnaps.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceAudioSnaps extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://audiosnaps.com/k/1qbt/',
            'http://audiosnaps.com/k/1oqz',
            'http://audiosnaps.com/k/2uld/',
            'http://audiosnaps.com/k/1qen',
            'http://audiosnaps.com/k/1qey/',
            'http://audiosnaps.com/k/1qf5',
            'http://audiosnaps.com/k/1qf2/',
        ),
        'invalid' => array(
            'http://audiosnaps.com/',
            'http://audiosnaps.com/about/faq/',
            'http://audiosnaps.com/about/contact/',
        ),
        'normalize' => array(
            'http://audiosnaps.com/k/1qf2/' => 'http://audiosnaps.com/k/1qf2/',
            'http://audiosnaps.com/k/1qf2' => 'http://audiosnaps.com/k/1qf2/',
        ),
        'fake' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('AudioSnaps'); }
}

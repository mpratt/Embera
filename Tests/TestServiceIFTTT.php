<?php
/**
 * TestServiceIFTTT.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceIFTTT extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://ifttt.com/recipes/112989',
            'https://www.ifttt.com/recipes/111063',
            'https://ifttt.com/recipes/113633/',
            'https://www.ifttt.com/recipes/109983/',
        ),
        'invalid' => array(
            'https://ifttt.com/recipes',
            'https://ifttt.com/',
            'https://ifttt.com/recipes/search?q=gmail',
            'https://ifttt.com/recipes/search',
        ),
        'fake' => array(
            'type' => 'rich',
            'html' => '<script'
        )
    );

    public function testProvider() { $this->validateProvider('IFTTT'); }
}

<?php
/**
 * TestServiceOfficemix.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceOfficemix extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://mix.office.com/watch/1x2i2ff1bla5w?lcid=1033',
            'https://mix.office.com/watch/1138kyipqqcog',
            'http://mix.office.com/watch/hgagc38i8wx9?lcid=1033',
            'https://mix.office.com/embed/q3xhljonccyo',
        ),
        'invalid' => array(
            'https://mix.office.com',
            'https://mix.office.com/gallery/category/featured',
            'https://mix.office.com/stuff/watch/q3xhljonccyo',
        ),
        'fake' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('Officemix'); }
}

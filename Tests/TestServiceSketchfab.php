<?php
/**
 * TestServiceSketchfab.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceSketchfab extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://sketchfab.com/show/lRyoY4ZsPRUMPlSiz03ORxTIXXK',
            'https://sketchfab.com/show/4e6urv5wnV8hxfhD2xUnSrvLNss',
            'https://sketchfab.com/show/s0eX1riDqEY6bT0uBtCjxC4V7OA',
            'https://sketchfab.com/show/lwVPifecIahu0rtGqlzZosBPFOC',
            'https://sketchfab.com/show/9lVs96AuFUAjKjwvsMG0Uf7Yy7b',
        ),
        'invalid' => array(
            'https://sketchfab.com/browse/',
            'https://sketchfab.com/browse/faved',
            'https://sketchfab.com/show/9lVs96AuFUAjKjwvsMG0Uf7Yy7b/other/crap',
            'https://sketchfab.com/order',
            'https://sketchfab.com/show/',
            'https://sketchfab.com/dashboard/upload',
            'https://sketchfab.com/'
        ),
        'normalize' => array(
            'https://www.sketchfab.com/show/9lVs96AuFUAjKjwvsMG0Uf7Yy7b' => 'https://sketchfab.com/show/9lVs96AuFUAjKjwvsMG0Uf7Yy7b',
            'https://sketchfab.com/show/9lVs96AuFUAjKjwvsMG0Uf7Yy7b' => 'https://sketchfab.com/show/9lVs96AuFUAjKjwvsMG0Uf7Yy7b',
            'https://sketchfab.com/show/9lVs96AuFUAjKjwvsMG0Uf7Yy7b/' => 'https://sketchfab.com/show/9lVs96AuFUAjKjwvsMG0Uf7Yy7b',
            'https://www.sketchfab.com/show/9lVs96AuFUAjKjwvsMG0Uf7Yy7b/' => 'https://sketchfab.com/show/9lVs96AuFUAjKjwvsMG0Uf7Yy7b',
        ),
        'fake' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('Sketchfab'); }
}
?>

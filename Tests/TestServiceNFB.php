<?php
/**
 * TestServiceNFB.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceNFB extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.nfb.ca/film/abegweit_en',
            'http://nfb.ca/film/act_of_dishonour',
            'http://www.nfb.ca/film/after_axe/',
            'http://nfb.ca/film/alexis_tremblay_habitant_en',
            'http://nfb.ca/film/the_animal_movie/',
            'http://www.nfb.ca/film/anniversary',
            'http://www.nfb.ca/film/anniversary/embed/player',
        ),
        'invalid' => array(
            'http://www.nfb.ca/explore-all-directors/tom-jackson/',
            'http://www.nfb.ca',
            'http://www.nfb.ca/film/',
            'http://nfb.ca/film/',
            'http://www.nfb.ca/explore-all-films/',
        ),
        'normalize' => array(
            'http://www.nfb.ca/film/anniversary/embed/player' => 'http://www.nfb.ca/film/anniversary',
        ),
        'fake' => array(
            'type' => 'video',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('NFB'); }
}
?>

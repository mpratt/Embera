<?php
/**
 * TestServiceScribd.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceScribd extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.scribd.com/doc/155739836/The-Time-Travel-Megapack-26-Modern-and-Classic-Science-Fiction-Stories',
            'http://www.scribd.com/doc/155740115/Daughter-of-the-Amazon-The-Golden-Amazon-Saga-Book-Five/',
            'http://scribd.com/doc/155740472/Alien-Abduction-The-Wiltshire-Revelations?=hey',
            'http://scribd.com/doc/119667881/Lessons-in-Lingerie/',
            'http://www.scribd.com/doc/115726071/10-Practical-Tools-for-a-Resilient-Local-Economy',
            'http://www.scribd.com/doc/14850258/Research-Motives-of-Vinyl-Use-Author-Robert-Arndt',
            'https://ru.scribd.com/document/14850258/Research-Motives-of-Vinyl-Use-Author-Robert-Arndt',
        ),
        'invalid' => array(
            'http://www.scribd.com/explore',
            'http://www.scribd.com/explore/Types/Featured?p=0',
            'http://scribd.com/doc/Lessons-in-Lingerie/',
            'http://scribd.com/119667881/Lessons-in-Lingerie/',
            'http://scribd.com/doc/119667881/Lessons-in-Lingerie/other-stuff',
        ),
        'fake' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('Scribd'); }
}

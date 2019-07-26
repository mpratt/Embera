<?php
/**
 * TestServiceSpeakerdeck.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceSpeakerdeck extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://speakerdeck.com/sva_1981/zhi-zhi-ju-tesuto',
            'http://www.speakerdeck.com/librarianavenger/librarian-avengers-film-rating-system',
            'http://speakerdeck.com/vinull/quest-for-fun',
            'https://speakerdeck.com/denniskardys/the-straight-up-how-to-draw-better-workshop',
        ),
        'invalid' => array(
            'https://speakerdeck.com/p/featured',
            'https://speakerdeck.com/c/programming',
            'https://speakerdeck.com/signup',
            'https://speakerdeck.com/',
            'https://speakerdeck.com/search?q=what+up',
            'https://speakerdeck.com/jamesclay/what-do-you-mean-someone-made-them-up/other-stuff',
        ),
    );

    public function testProvider() { $this->validateProvider('Speakerdeck'); }
}

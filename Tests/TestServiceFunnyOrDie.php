<?php
/**
 * TestServiceFunnyOrDie.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceFunnyOrDie extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.funnyordie.com/videos/a1738b0a3f/i-hate-california-lake-tahoe',
            'http://funnyordie.com/videos/8b2b588243/tom-brady-s-best-friend',
            'http://www.funnyordie.com/videos/6b0b308f41/coming-soon-from-funny-or-die-with-will-ferrell/',
            'http://funnyordie.com/videos/c4d450418e/magician-vs-wild',
            'http://funnyordie.com/embed/c4d450418e/magician-vs-wild',
            'http://funnyordie.com/embed/c4d450418e',
            'http://www.funnyordie.com/videos/bc5f676260/tony-hale-s-acting-process',
            'http://www.funnyordie.com/videos/bc5f676260/tony-hale-s-acting-process/other/stuff',
        ),
        'invalid' => array(
            'http://www.funnyordie.com/#search-menu',
            'http://www.funnyordie.com/pictures/2d8a7b4876/get-the-look-miley-cyrus', // Pictures dont allow oembed
            'http://www.funnyordie.com/drunkhistory',
            'http://www.funnyordie.com/browse/videos/all/all/most_viewed/this_week',
            'http://www.funnyordie.com/support/widget',
            'http://www.funnyordie.com/marion_cotillard',
        ),
        'normalize' => array(
            'http://www.funnyordie.com/embed/6b0b308f41/coming-soon-from-funny-or-die-with-will-ferrell/' => 'http://www.funnyordie.com/videos/6b0b308f41/coming-soon-from-funny-or-die-with-will-ferrell',
            'http://www.funnyordie.com/embed/6b0b308f41/' => 'http://www.funnyordie.com/videos/6b0b308f41',
            'http://www.funnyordie.com/embed/6b0b308f41/?query=string' => 'http://www.funnyordie.com/videos/6b0b308f41',
        ),
        'fake' => array(
            'type' => 'video',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('FunnyOrDie'); }
}

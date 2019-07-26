<?php
/**
 * TestServiceChirbit.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceChirbit extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://chirb.it/w3gGKr',
            'http://chirb.it/gJDBHO',
            'http://chirb.it/wtJs5e/',
            'http://www.chirb.it/185err',
            'http://chirb.it/x0sw0k',
            'http://chirb.it/zGt9tG',
        ),
        'invalid' => array(
            'http://chirbit.it/top-50-chirbits-this-week.php',
            'http://www.chirbit.com/top-50-chirbits-this-week.php',
            'http://www.chirbit.com/',
            'http://chirb.it',
        ),
        'normalize' => array(
            'http://chirb.it/wp/wtJs5e/' => 'http://chirb.it/wtJs5e',
            'http://chirb.it/wp/wtJs5e/other/stuff' => 'http://chirb.it/wtJs5e',
            'http://chirb.it/wp/wtJs5e' => 'http://chirb.it/wtJs5e',
        ),
        'fake' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('Chirbit'); }
}

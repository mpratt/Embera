<?php
/**
 * TestServiceJustinTV.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceJustinTV extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.justin.tv/skyfire_trains_tv',
            'http://www.justin.tv/cpnlive/',
            'http://justin.tv/crazy_american',
            'http://www.justin.tv/marksr',
            'http://www.justin.tv/thegeekgroup',
            'http://justin.tv/clubzonefm/',
        ),
        'invalid' => array(
            'http://www.justin.tv/directory/featured',
            'http://www.justin.tv/',
            'http://www.justin.tv/thegeekgroup/otherstuff/hey',
            'http://www.justin.tv/user/login',
            'http://www.justin.tv/p/about_us',
            'http://www.justin.tv/directory/social',
            'http://www.justin.tv/directory/sports',
        ),
        'normalize' => array(
            'http://justin.tv/directory/' => 'http://www.justin.tv/directory',
            'http://justin.tv/directory' => 'http://www.justin.tv/directory',
            'http://www.justin.tv/directory' => 'http://www.justin.tv/directory',
        )
    );

    public function testProvider() { $this->validateProvider('JustinTV'); }
}
?>

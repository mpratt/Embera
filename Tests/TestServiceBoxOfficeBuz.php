<?php
/**
 * TestServiceBoxOfficeBuz.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceBoxOfficeBuz extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://movies.boxofficebuz.com/video/jack-reacher-never-go-back-tv-spot-hunting',
            'http://movies.boxofficebuz.com/video/ghost-in-the-shell-trailer-teaser-5',
        ),
        'invalid' => array(
            'https://news.boxofficebuz.com/',
            'https://news.boxofficebuz.com/article/jeremy-renner-won-t-be-back-for-mission-impossible-6',
        ),
    );

    public function testProvider() { $this->validateProvider('BoxOfficeBuz'); }
}
?>

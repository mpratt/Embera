<?php
/**
 * TestServiceWordpressTV.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceWordpressTV extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://wordpress.tv/2013/08/25/andy-hayes-website-critiques-how-to-decide-what-works-and-what-to-ditch/',
            'http://wordpress.tv/2013/05/09/understanding-the-add-new-link-screen-and-xfn-link-relationships/',
            'http://wordpress.tv/2013/04/20/kimanzi-constable-the-power-of-your-story-through-wordpress/',
            'http://wordpress.tv/2013/04/12/jayvie-canono-designing-for-development',
            'http://blog.wordpress.tv/2013/08/08/state-of-the-word-retrospective/',
            'http://blog.wordpress.tv/2010/06/21/wordpress-3-0-videos/'
        ),
        'invalid' => array(
            'http://wordpress.tv/tag/plugins/',
            'http://wordpress.tv/get-involved/',
            'http://wordpress.tv/category/how-to/',
        ),
    );

    public function testProvider() { $this->validateProvider('WordpressTV'); }
}

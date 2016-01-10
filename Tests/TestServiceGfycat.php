<?php
/**
 * TestServiceGfycat.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceGfycat extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://gfycat.com/SerpentineScientificJenny',
            'https://gfycat.com/FloweryAnnualArchaeopteryx',
            'http://www.gfycat.com/IckyDemandingHorse',
            'https://gfycat.com/DesertedSleepyBluetickcoonhound/',
            'http://gfycat.com/MadeupFarflungHoiho/?query=string',
            'http://gfycat.com/MiniatureCautiousDuiker',
        ),
        'invalid' => array(
            'http://gfycat.com/',
            'http://gfycat.com/search/dfsdfsdf',
            'http://gfycat.com/stuff/MiniatureCautiousDuiker',
            'http://gfycat.com/terms',
            'http://gfycat.com/dmca',
            'http://gfycat.com/api',
        ),
        'fake' => array(
            'type' => 'video',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('Gfycat'); }
}
?>

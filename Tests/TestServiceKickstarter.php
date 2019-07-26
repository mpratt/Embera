<?php
/**
 * TestServiceKickstarter.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceKickstarter extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.kickstarter.com/projects/1330686256/americas-candy-all-natural-vegan-and-allergy-frien?ref=home_popular',
            'http://www.kickstarter.com/projects/yonder/dino-pet-a-living-bioluminescent-night-light-pet?ref=home_popular',
            'http://www.kickstarter.com/projects/762504755/apparitions-from-the-inferno?ref=home_location',
            'http://kickstarter.com/projects/1093644807/and-the-meek-shall-inherit',
            'http://www.kickstarter.com/projects/940737263/a-very-special-new-stripped-down-sea-wolf-album',
            'http://www.kickstarter.com/projects/DaveRyan/owlgirls',
            'http://www.kickstarter.com/projects/lenswithaview/standing-in-the-stars-the-peter-mayhew-story',
        ),
        'invalid' => array(
            'http://www.kickstarter.com/discover',
            'http://www.kickstarter.com/start',
            'http://www.kickstarter.com/',
            'http://www.kickstarter.com/DaveRyan/owlgirls',
            'http://www.kickstarter.com/projects/DaveRyan',
        ),
        'normalize' => array(
            'http://www.kickstarter.com/projects/1330686256/americas-candy-all-natural-vegan-and-allergy-frien?ref=home_popular' => 'http://www.kickstarter.com/projects/1330686256/americas-candy-all-natural-vegan-and-allergy-frien',
            'http://www.kickstarter.com/projects/1330686256/americas-candy-all-natural-vegan-and-allergy-frien?ref=home_popular&other=stuff-yeah' => 'http://www.kickstarter.com/projects/1330686256/americas-candy-all-natural-vegan-and-allergy-frien',
            'http://www.kickstarter.com/projects/1330686256/americas-candy-all-natural-vegan-and-allergy-frien' => 'http://www.kickstarter.com/projects/1330686256/americas-candy-all-natural-vegan-and-allergy-frien',
            'http://kickstarter.com/projects/1330686256/americas-candy-all-natural-vegan-and-allergy-frien' => 'http://www.kickstarter.com/projects/1330686256/americas-candy-all-natural-vegan-and-allergy-frien',
            'https://kickstarter.com/projects/1330686256/americas-candy-all-natural-vegan-and-allergy-frien' => 'https://www.kickstarter.com/projects/1330686256/americas-candy-all-natural-vegan-and-allergy-frien',
        ),
        'fake' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    /**
     *@large
     */
    public function testProvider()
    {
        if (getenv('TRAVIS')) {
            $this->markTestSkipped('Travis-ci seems to have problems testing this provider. Test it locally instead! It usually works!');
            return ;
        }

        $this->validateProvider('Kickstarter');
    }
}

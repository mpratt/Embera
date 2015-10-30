<?php
/**
 * TestServiceSlideShare.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceSlideShare extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.slideshare.net/shvmdhwn/personal-branding-do-it-yourself',
            'http://slideshare.net/robinhbchan/project-bbx',
            'http://www.slideshare.net/CNTMAN216/5linxbusinessopppresentation/',
            'http://es.slideshare.net/appsfire/app-score-report-july-2012',
            'http://www.slideshare.net/RobertGonzalez11/intelligent-onlinemarketingformedical/',
            'http://www.slideshare.net/andreasklinger/startup-metrics-a-love-story',
            'http://www.slideshare.net/FiratDemirel/hyperloop-alpha-elon-musk',
        ),
        'invalid' => array(
            'http://www.slideshare.net/newlist/popular/language/de',
            'http://www.slideshare.net/newlist/popular/week',
            'http://www.slideshare.net/newlist/popular',
            'http://www.slideshare.net/FiratDemirel',
            'http://www.slideshare.net',
            'http://www.slideshare.net/search/slideshow?searchfrom=header&q=start',
        ),
    );

    public function testProvider() { $this->validateProvider('SlideShare'); }
}
?>

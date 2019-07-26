<?php
/**
 * TestServicePollDaddy.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServicePollDaddy extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://polldaddy.com/poll/7012505/',
            'http://polldaddy.com/s/ADF2AB9E60258D2A/',
            'http://polldaddy.com/ratings/39/',
            'http://polldaddy.com/poll/6976912/',
            'https://polldaddy.com/poll/7205026/',
            'http://www.polldaddy.com/poll/7012505',
            'http://mpcimageartist.polldaddy.com/s/emotions',
            'http://theguy1979.polldaddy.com/s/growing-up-biracial-in-america-being-of-mixed-race-descent-in-2013',
        ),
        'invalid' => array(
            'https://polldaddy.com/features/',
            'http://polldaddy.com',
            'https://polldaddy.com/pricing/',
            'https://polldaddy.com/poll/7205026/other-stuff',
        ),
        'normalize' => array(
            'https://www.polldaddy.com/poll/6976912/' => 'http://polldaddy.com/poll/6976912/',
            'http://www.polldaddy.com/poll/6976912/' => 'http://polldaddy.com/poll/6976912/',
            'http://polldaddy.com/poll/6976912/' => 'http://polldaddy.com/poll/6976912/',
            'https://polldaddy.com/poll/7205026/' => 'http://polldaddy.com/poll/7205026/',
        ),
        /*'fake' => array(
            'type' => 'rich',
            'html' => '<script'
        )*/
    );

    public function testProvider() { $this->validateProvider('PollDaddy'); }
}

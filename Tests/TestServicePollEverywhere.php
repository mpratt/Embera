<?php
/**
 * TestServicePollEverywhere.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServicePollEverywhere extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.polleverywhere.com/free_text_polls/LTk2NTg4NDI4MQ',
            'http://www.polleverywhere.com/free_text_polls/NDk3OTE0ODgy/',
            'http://polleverywhere.com/multiple_choice_polls/LTQxNTU4OTUx',
            'http://www.polleverywhere.com/multiple_choice_polls/LTE5NTcwMzU0MjA/',
        ),
        'invalid' => array(
            'https://www.polleverywhere.com/login',
            'http://www.polleverywhere.com/plans',
            'http://www.polleverywhere.com',
        )
    );

    public function testProvider() { $this->validateProvider('PollEveryWhere'); }
}
?>

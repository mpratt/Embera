<?php
/**
 * TestServiceEduMedia.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceEduMedia extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://www.edumedia-sciences.com/en/media/834-9-months-to-create-life',
            'http://edumedia-sciences.com/fr/media/836',
        ),
        'invalid' => array(
            'https://www.edumedia-sciences.com/',
            'http://edumedia-sciences.com/fr//836',
        ),
    );

    public function testProvider() { $this->validateProvider('EduMedia'); }
}
?>

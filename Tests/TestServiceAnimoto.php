<?php
/**
 * TestServiceAnimoto.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceAnimoto extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://animoto.com/play/JzwsBn5FRVxS0qoqcBP5zA',
            'http://animoto.com/play/JzwsBn5FRVxS0qoqcBP5zA/',
            'http://www.animoto.com/play/JzwsBn5FRVxS0qoqcBP5zA/',
            'http://animoto.com/play/tH6T0044UCwFiALmCxbjgA',
            'http://www.animoto.com/play/tH6T0044UCwFiALmCxbjgA',
            'http://animoto.com/play/WafRFTXfiG1e7FueGwgm2w/',
            'http://www.animoto.com/play/9jR5D89nw7Cw61laPFhpsQ/'
        ),
        'invalid' => array(
            'http://animoto.com/features',
            'http://animoto.com/#examples',
            'http://www.animoto.com/play/JzwsBn5FRVxS0qoqcBP5zA/other-stuff',
            'http://animoto.com/',
        ),
    );

    /**
     * @large
     */
    public function testProvider() { $this->validateProvider('Animoto'); }
}
?>

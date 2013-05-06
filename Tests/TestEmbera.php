<?php
/**
 * TestEmbera.php
 *
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class TestEmbera extends PHPUnit_Framework_TestCase
{
    public function testInvalidAutoEmbedInput()
    {
        $this->setExpectedException('InvalidArgumentException');

        $embera = new \Embera\Embera();
        $embera->autoEmbed(array('http://www.youtube.com/watch?v=GP18O6gSWSw&feature=share&list=PL4EF7BAD98F9812B6'));
    }
}

?>

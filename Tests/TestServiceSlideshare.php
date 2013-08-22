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

class TestServiceSlideShare extends TestProviders { public function testProvider() { $this->validateProvider('SlideShare'); } }
?>

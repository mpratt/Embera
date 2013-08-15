<?php
/**
 * TestServiceRevision3.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceRevision3 extends TestProviders { public function testProvider() { $this->validateProvider('Revision3'); } }
?>

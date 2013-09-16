<?php
/**
 * TestServiceGeographUk.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceGeographUk extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.geograph.org.uk/photo/3619867',
            'http://www.geograph.org.uk/photo/2308394/',
            'http://www.geograph.org.uk/photo/1449749',
            'http://www.geograph.co.uk/photo/292839',
            'http://www.geograph.ie/photo/353656',
            'http://www.geograph.org.uk/photo/1146430',
            'http://www.geograph.ie/photo/973235',
        ),
        'invalid' => array(
            'http://www.geograph.ie/gallery.php',
            'http://www.geograph.org/gallery.php?tab=highest',
            'http://www.geograph.org.uk/photo/2000063/other/stuff',
            'http://www.geograph.org.uk/photo/words',
        ),
    );

    public function testProvider() { $this->validateProvider('GeographUk'); }
}
?>

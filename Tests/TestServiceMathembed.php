<?php
/**
 * TestServiceMathembed.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceMathembed extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://mathembed.com/latex?inputText=f(x)%20%3D%20%5Cint_%7B-%5Cinfty%7D%5E%5Cinfty%20%5Chat%20f(%5Cxi)%5C%2Ce%5E%7B2%20%5Cpi%20i%20%5Cxi%20x%7D%20%5C%2Cd%5Cxi',
            'http://www.mathembed.com/latex?inputText=f(x)%20%3D%205%20%2B%205',
        ),
        'invalid' => array(
            'https://mathembed.com/notlatex?inputText=f(x)%20%3D%205%20%2B%205',
            'https://mathembed.com',
        ),
    );

    public function testProvider() { $this->validateProvider('Mathembed'); }
}
?>

<?php
/**
 * TestServiceIssuu.php
 *
 * @package Tests
 * @author Rob Taylor <rob@uxblondon.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceIssuu extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://issuu.com/adidasoutdoormag/docs/h10373_ou_outdoor_ss15-terrex_magaz',
            'https://issuu.com/adidasoutdoormag/docs/h10373_ou_outdoor_ss15-terrex_magaz',
        ),
        'invalid' => array(
            'https://issuu.com/',
            'http://issuu.com/?e=0/9134577',
        ),
    );

    public function testProvider() { $this->validateProvider('Issuu'); }
}
?>

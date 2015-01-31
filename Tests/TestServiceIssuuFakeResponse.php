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

class TestServiceIssuuFakeResponse extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://issuu.com/tennisaustralia/docs/ao___aos_2015_ticket_guide?e=0/9134577',
            'http://issuu.com/marmotmountaineurope/docs/katalog_f14_en?e=0/10148346',
            'https://issuu.com/marmotmountaineurope/docs/katalog_f14_en?e=0/10148346',
        ),
        'invalid' => array(
            'https://issuu.com/',
            'http://issuu.com/?e=0/9134577',
        ),
        'fake' => array(
            'type' => 'rich',
            'html' => '<script'
        )
    );

    public function testProvider() { $this->validateProvider('Issuu'); }
}
?>

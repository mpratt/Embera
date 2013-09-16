<?php
/**
 * TestServiceDailyMile.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceDailyMile extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.dailymile.com/people/EddieJ3/entries/24776213',
            'http://www.dailymile.com/people/JessicaP30/entries/24791047',
            'http://www.dailymile.com/people/JimF3/entries/24684863',
            'http://www.dailymile.com/people/JimF3/entries/24623801/',
            'http://dailymile.com/people/JimF3/entries/24447986',
            'http://dailymile.com/people/IANH17/entries/24533363/',
            'http://www.dailymile.com/people/IANH17/entries/24444266',
        ),
        'invalid' => array(
            'http://www.dailymile.com/people/EddieJ3',
            'http://www.dailymile.com/',
            'http://www.dailymile.com/signup',
            'http://www.dailymile.com/people/K_P_S',
        ),
    );

    public function testProvider() { $this->validateProvider('DailyMile'); }
}
?>

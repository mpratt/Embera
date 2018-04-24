<?php
/**
 * TestServiceSoundCloud.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceSoundCloud extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://soundcloud.com/lospetitfellas/ser-libre-ft-alejandro-cole',
            'https://www.soundcloud.com/lospetitfellas/1150pm/',
            'https://soundcloud.com/lospetitfellas/sets/queridofrankie/',
            'https://soundcloud.com/smodco/babbleon-136',
            'https://m.soundcloud.com/smodco/isellcomics-93',
            'https://soundcloud.com/groups/rap-hiphop/',
            'https://soundcloud.com/groups/house-dj-sets',
            'https://soundcloud.com/tyrantofdeath/injection-remastered-2013/',
            'https://soundcloud.com/fernandomeira',
            'https://soundcloud.com/whatsonot/what-so-not-touched',
            'https://soundcloud.com/martingarrix/martin-garrix-jay-hardway-19',
            'https://soundcloud.com/guardianscienceweekly/science-weekly-podcast-the-25',
            'http://m.soundcloud.com/ricardobufalo/the-beatles-tomorrow-never',
        ),
        'invalid' => array(
            'https://soundcloud.com/explore',
            'https://soundcloud.com/groups',
            'https://soundcloud.com',
        ),
    );

    public function testProvider() { $this->validateProvider('SoundCloud'); }

    public function testModifyResponse()
    {
        $oembed = new \Embera\Oembed(new \Embera\HttpRequest());
        $service = '\Embera\Providers\SoundCloud' ;
        $test = new $service($this->urls['valid'][0], array('oembed' => true, 'fake' => array(), 'params' => array()), $oembed);

        $response['html'] ='<iframe width="100%" height="400" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?visual=true&url=https%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F373180994&show_artwork=true"></iframe>';

        $modifyResponse = self::getMethod('modifyResponse');

        $response = $modifyResponse->invokeArgs($test, array($response));

        $this->assertEquals('<iframe width="100%" height="400" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?visual=true&url=https%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F373180994&show_artwork=true&hide_related=true"></iframe>', $response['html']);
    }

    protected static function getMethod($name)
    {
        $class = new ReflectionClass('\Embera\Providers\SoundCloud');
        $method = $class->getMethod($name);
        $method->setAccessible(true);

        return $method;
    }

}
?>

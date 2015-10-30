<?php
/**
 * TestServiceRutube.php
 *
 * @package Tests
 * @author dotzero <mail@dotzero.ru>
 * @link   http://www.dotzero.ru/
 */

require_once 'TestProviders.php';

class TestServiceRutube extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://rutube.ru/video/51b5b6ebeb1ce0a1344f323dc45201be/',
            'http://rutube.ru/video/51b5b6ebeb1ce0a1344f323dc45201be',
            'http://rutube.ru/video/cbcd2e76af0ad61fedff1a87eb2e5e74/',
            'http://rutube.ru/video/cbcd2e76af0ad61fedff1a87eb2e5e74',
        ),
        'invalid' => array(
            'http://rutube.ru/metainfo/tv/27/',
            'http://rutube.ru/metainfo/tv/27/#!/season1',
            'http://rutube.ru/video/person/953339/',
        ),
        'normalize' => array(
            'http://rutube.ru/video/51b5b6ebeb1ce0a1344f323dc45201be' => 'http://rutube.ru/video/51b5b6ebeb1ce0a1344f323dc45201be/',
            'http://www.rutube.ru/video/51b5b6ebeb1ce0a1344f323dc45201be' => 'http://rutube.ru/video/51b5b6ebeb1ce0a1344f323dc45201be/',
        ),
    );

    public function testProvider() { $this->validateProvider('Rutube'); }
}

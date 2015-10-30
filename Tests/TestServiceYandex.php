<?php
/**
 * TestServiceYandex.php
 *
 * @package Tests
 * @author dotzero <mail@dotzero.ru>
 * @link   http://www.dotzero.ru/
 */

require_once 'TestProviders.php';

class TestServiceYandex extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://video.yandex.ru/users/ya-events/view/2620/',
            'http://video.yandex.ru/users/ya-events/view/2620',
            'https://video.yandex.ru/users/ya-events/view/2620/',
            'https://video.yandex.ru/users/ya-events/view/2620',
        ),
        'invalid' => array(
            'https://video.yandex.ru/view/ya-events/view/2620/',
            'https://video.yandex.ru/ya-events/view/2620/',
            'https://video.yandex.ru/users/ya-events/view/',
        ),
        'normalize' => array(
            'http://video.yandex.ru/users/ya-events/view/2620' => 'http://video.yandex.ru/users/ya-events/view/2620/',
            'http://www.video.yandex.ru/users/ya-events/view/2620' => 'http://video.yandex.ru/users/ya-events/view/2620/',
        ),
    );

    public function testProvider() { $this->validateProvider('Yandex'); }
}

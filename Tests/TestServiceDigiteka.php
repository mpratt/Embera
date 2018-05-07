<?php

require_once 'TestProviders.php';

class TestServiceDigiteka extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://www.ultimedia.com/default/index/videogeneric/id/8mr0v0/showtitle/1',
            'https://ultimedia.com/default/index/videogeneric/id/8mr0v0/showtitle/1',
            'https://ultimedia.com/default/index/videogeneric/id/8mr0v0',
            'https://www.ultimedia.com/default/index/videogeneric/id/kxvulm/showtitle/1/viewnc/1',
        ),
        'invalid' => array(
            'https://www.ultimedia.com/default/index/videogeneric/notid/8mr0v0',
            'https://dailymotion.com/default/index/videogeneric/id/8mr0v0',
            'https://ultimedia.fr/default/index/videogeneric/id/8mr0v0',
        )
    );

    public function testProvider() { $this->validateProvider('Digiteka'); }
}
?>

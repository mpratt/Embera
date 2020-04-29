<?php

require_once 'TestProviders.php';

class TestServiceAcast extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://embed.acast.com/minute-papillon/coronavirus-denouvellesfakenews',
            'https://embed.acast.com/minute-papillon/3-0-final-france-bresil-de-ping-pong',
        ),
        'invalid' => array(
            'https://play.acast.com/s/minute-papillon/7cb8e73d-0292-4e19-a361-db546f2ca5ec',
        )
    );

    public function testProvider() {
        $this->validateProvider('Acast');
    }
}

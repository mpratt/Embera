<?php

require_once 'TestProviders.php';

class TestServiceAcast extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://embed.acast.com/emotions/f8c555da-c6d5-4d51-9e48-8b0a6a7d44dd',
            'https://play.acast.com/s/minute-papillon/7cb8e73d-0292-4e19-a361-db546f2ca5ec',
        ),
        'invalid' => array(
            'https://player.acast.com/minute-papillon/7cb8e73d-0292-4e19-a361-db546f2ca5ec',
        ),
        'fake' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('Acast');
    }
}

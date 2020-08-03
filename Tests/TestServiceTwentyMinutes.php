<?php

require_once 'TestProviders.php';

class TestServiceTwentyMinutes extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://membre.20minutes.fr/newsletters/solutions',
        ),
        'invalid' => array(
            'https://www.20minutes.fr/newsletters/solutions',
            'https://membre.20minutes.fr/planete/solutions',
        ),
        'fake' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('TwentyMinutes');
    }
}

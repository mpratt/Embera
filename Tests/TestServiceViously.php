<?php

require_once 'TestProviders.php';

class TestServiceViously extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://www.viously.com/20minutes/_4Ychn7nFWR'
        ),
        'invalid' => array(
            'https://www.viously.com/azjd/20minutes/gqsdplqjsdqsk',
            'https://www.viousli.com/20minutes/gqsdplqjsdqsk',
        ),
        'fake' => array(
            'type' => 'video',
            'html' => '<div'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('Viously');
    }
}

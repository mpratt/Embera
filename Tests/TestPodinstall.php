<?php

require_once 'TestProviders.php';

class TestPodinstall extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://podcasts.20minutes.fr/20-minutes-beraud-lete-dans-vos-oreilles/202008210400-labbe-volant-deforges-chanoine-detampes-mysteres-dici-8.html',
            'https://podcasts.20minutes.fr/20-minutes-minute-papillon/202011201204-les-petites-luxures-le-sexe-dessine-par-simon-frankart.html',
            'https://podcasts.20minutes.fr/20-minutes-sixieme-science/202011130600-le-pergelisol-la-bombe-climatique-qui-menace-la-planete.html',
            'https://podcasts.20minutes.fr/20-minutes-juste-un-droit/201911201345-comment-juger-les-violences-conjugales.html',
        ),
        'invalid' => array(
            'https://podcasts.20minutes.fr/',
            'https://podcasts.20minutes.fr/20-minutes-juste-un-droit/',
            'https://podcasts.20minutes.fr/20-minutes-sixieme-sens/202011130600',
            'https://podcasts.20minutes.fr/20-minutes-sixieme-sens/202011130600-le-pergelisol-la-bombe-climatique-qui-menace-la-planete.html',
        ),
        'fake' => array(
            'type' => 'rich',
            'html' => '<div'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('Podinstall');
    }
}

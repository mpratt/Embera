<?php

namespace Embera\Providers;

/**
 * The Podinstall Provider
 * @link https://www.podinstall.com/
 */
class Podinstall extends \Embera\Adapters\Service
{
    /** inline {@inheritdoc} */
    protected $apiUrl = 'https://podcasts.podinstall.com/oembed';

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->stripLastSlash();

        return (preg_match('~podcasts.20minutes.fr/20-minutes-(?:sixieme-science|minute-papillon|juste-un-droit|beraud-lete-dans-vos-oreilles)/[0-9]+-[\w-]+.html~i', $this->url));
    }

    /** inline {@inheritdoc} */
    public function fakeResponse()
    {
        preg_match('~podcasts.20minutes.fr/20-minutes-(sixieme-science|minute-papillon|juste-un-droit|beraud-lete-dans-vos-oreilles)/([0-9]+-[\w-]+).html~i', $this->url, $matches);
        
        switch ($matches[1]) {
            case 'sixieme-science':
              $sectionId = '62bdb45fc61180c5a3bf4da64223d818755a635d';
            break;
            case 'minute-papillon':
              $sectionId = 'ca1f2ba48cf894901fecbbf5d95733d618967e40';
            break;
            case 'juste-un-droit':
              $sectionId = 'f82969ba934924f6ce7a96c3e749d52affd39b2c';
            break;
            case 'beraud-lete-dans-vos-oreilles':
              $sectionId = '540833d4d5470463eb78a14c8ad3631f3aaac037';
            break;
          default:
            $sectionId = '';
        }

        $episode = $matches[2];

        $html = <<<EOD
            <div class="pi-wrapper" data-podcast-id="%s" data-episode="%s">
            <script>
                !function (e, t) { var c, a; (c = t.createElement("script")).src = "https://podcasts.20minutes.fr/v1/embed/%s.js", c.async = 1, (a = t.getElementsByTagName("script")[0]).parentNode.insertBefore(c, a) }(0, document);
            </script>
            </div>
EOD;

        return array(
            'version' => '1.0',
            'type' => 'rich',
            'provider_name' => 'Podinstall',
            'provider_url' => '',
            'html' => sprintf($html, $sectionId, $episode, $sectionId)
        );
    }
}

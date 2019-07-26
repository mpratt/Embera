<?php
/**
 * TestServiceSapo.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceSapo extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://videos.sapo.pt/1z2ieEQvWVZ6af0nQZFN',
            'http://videos.sapo.pt/ZpO1SNwJwjjjmuOlDqGN/',
            'http://videos.sapo.pt/2VA8L9zp3eSUn0HTsG3G',
            'http://videos.sapo.pt/R3wmOAGyjZFRkwdRbmHs',
            'http://videos.sapo.pt/R5Y9lJteSAzyf5V5uAhD',
            'http://videos.sapo.pt/sk9LmQAH0PQ4Pz1iupkV',
            'http://videos.sapo.pt/HAUithzZK3SShqIRGQBA',
            'http://videos.sapo.pt/eFdSRwoVzYQQ4NVEtGF6',
        ),
        'invalid' => array(
            'http://videos.sapo.pt/top.html',
            'http://www.sapo.pt/',
            'http://videos.sapo.pt/tag.html?insanospt',
            'http://videos.sapo.pt/categorias.html',
            'http://videos.sapo.pt/sapotv.html',
        ),
        'fake' => array(
            'type' => 'video',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('Sapo'); }
}

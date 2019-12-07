<?php
/**
 * UniversitePantheonSorbonneTest.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Provider;

use Embera\ProviderTester;

/**
 * Test the UniversitePantheonSorbonne Provider
 */
final class UniversitePantheonSorbonneTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://mediatheque.univ-paris1.fr/video/1839-revue-1257-n1-eclairages-sur-le-cinema/',
            'https://mediatheque.univ-paris1.fr/video/1833-discovering-greek-roman-cities-teaser-fr/',
            'https://mediatheque.univ-paris1.fr/video/1786-entretien-avec-bruno-cotte/',
        ],
        'invalid_urls' => [
            'https://mediatheque.univ-paris1.fr/',
        ],
        'fake_response' => [
            'type' => 'video',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('UniversitePantheonSorbonne', [ 'width' => 480, 'height' => 270]);
    }
}

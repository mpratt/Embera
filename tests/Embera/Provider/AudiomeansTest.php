<?php
/**
 * AudiomeansTest.php
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
 * Test the Audiomeans Provider
 */
final class AudiomeansTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://podcasts.audiomeans.fr/player-v2/anti-brouillard-6340b48dedde/episodes/4e490cb9-41fe-48f2-9781-ee0354917c74?color=871f78',
        ],
        'invalid_urls' => [
            'https://podcasts.audiomeans.fr/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Audiomeans', [ 'width' => 480, 'height' => 270]);
    }
}

<?php
/**
 * UpecPodTest.php
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
 * Test the UpecPod Provider
 */
final class UpecPodTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://pod.u-pec.fr/video/0268-prammics-presentation/',
        ],
        'invalid_urls' => [
            'https://pod.u-pec.fr/',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('UpecPod', [ 'width' => 480, 'height' => 270]);
    }
}

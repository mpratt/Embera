<?php
/**
 * InjurymapTest.php
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
 * Test the Injurymap Provider
 */
final class InjurymapTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.injurymap.com/exercises/fRDTATSGQQIM',
            'http://www.injurymap.com/exercises/re3G3eg4NHd1?query=string',
            'https://injurymap.com/exercises/UESNbXgkBiC3',
        ],
        'invalid_urls' => [
            'https://www.injurymap.com/',
            'https://www.injurymap.com/exercises/',
            'https://www.injurymap.com/exercises/UESNbXgkBiC3/other-stuff',
        ],
        'fake_response' => [
            'type' => 'video',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Injurymap', [ 'width' => 480, 'height' => 270]);
    }
}

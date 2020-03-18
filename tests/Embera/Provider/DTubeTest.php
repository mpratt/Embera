<?php
/**
 * DTubeTest.php
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
 * Test the DTube Provider
 */
final class DTubeTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://d.tube/#!/v/marketingmonk/t0fj6eip'
        ),
        'invalid_urls' => array(
            'https://d.tube',
            'https://d.tube/#!/s/colombia',
            'https://d.tube/#!/hotvideos'
        ),
        'normalize_urls' => array(
            'https://d.tube/#!/v/crystalliu/QmTYqXRqvbTJFoP6p9uapcEf36TNcin9RdHvychW1wkVvu' => 'https://d.tube/v/crystalliu/QmTYqXRqvbTJFoP6p9uapcEf36TNcin9RdHvychW1wkVvu',
        ),
        'fake_response' => array(
            'type' => 'video',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $travis = (bool) getenv('ONTRAVIS');
        if ($travis) {
            $this->markTestIncomplete('Disabling testing because provider seems to have stop providing oembed capabilities (DTube). If it continues to fail it will be deleted.');
        }

        $this->validateProvider('DTube', [ 'width' => 480, 'height' => 270]);
    }
}

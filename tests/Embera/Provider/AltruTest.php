<?php
/**
 * AltruTest.php
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
 * Test the Altru Provider
 */
final class AltruTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://app.altrulabs.com/talentbrand/feed?answer_id=2059&data=stuff',
            'https://app.altrulabs.com/talentbrand/feed/?answer_id=2058',
            'https://app.altrulabs.com/player/41329'
        ),
        'invalid_urls' => array(
            'https://app.altrulabs.com/talentbrand/feed?data=stuff',
            'https://app.altrulabs.com/?answer_id=2058'
        ),
        'normalize_urls' => array(
            'http://app.altrulabs.com/talentbrand/feed/?answer_id=2058' => 'https://app.altrulabs.com/talentbrand/feed/?answer_id=2058',
        ),
        'fake_response' => array(
            'type' => 'video',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('Altru', [ 'width' => 480, 'height' => 270]);
    }
}

<?php
/**
 * EduMediaTest.php
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
 * Test the EduMedia Provider
 */
final class EduMediaTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://edumedia-sciences.com/fr/media/931-de-la-cellule-a-lorganisme',
            'http://www.edumedia-sciences.com/fr/media/620-metamorphose-du-tetard',
            'https://www.edumedia-sciences.com/en/media/621',
        ),
        'invalid_urls' => array(
            'https://edumedia-sciences.com',
            'http://www.edumedia-sciences.com/media/620-metamorphose-du-tetard',
        ),
        'normalize_urls' => array(
            'http://edumedia-sciences.com/fr/media/931-de-la-cellule-a-lorganisme?script=true' => 'https://edumedia-sciences.com/fr/media/931-de-la-cellule-a-lorganisme',
        ),
        'fake_response' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('EduMedia', [ 'width' => 480, 'height' => 270]);
    }
}

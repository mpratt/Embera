<?php
/**
 * ArchivosTest.php
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
 * Test the Archivos Provider
 */
final class ArchivosTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'http://www.archivos.digital/app/view/850/web?embed',
            'http://www.archivos.digital/app/view/850/map?embed&visibility=public',
            'https://archivos.digital/app/view/921/timeline/12146?embed&visibility=public',
            'https://www.archivos.digital/app/view/391/web',
            'https://archivos.digital/app/view/391/timeline/6145',
        ),
        'invalid_urls' => array(
            'https://www.archivos.digital/app/view/391/other?embed&visibility=public',
            'https://www.archivos.digital/app/noview/391/other?embed&visibility=public',
        ),
        'normalize_urls' => array(
            'http://www.archivos.digital/app/view/850/web?embed' => 'https://www.archivos.digital/app/view/850/web',
        ),
        'fake_response' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('Archivos', [ 'width' => 480, 'height' => 270]);
    }
}

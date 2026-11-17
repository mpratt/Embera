<?php
/**
 * BlackfireIOTest.php
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
 * Test the BlackfireIO Provider
 */
final class BlackfireIOTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://blackfire.io/profiles/ffcffdc1-50db-42bc-bcbb-dcfe86758e26/graph?settings%5Bdimension%5D=wt&settings%5Bdisplay%5D=landscape&settings%5BtabPane%5D=nodes&selected=&callname=main()&constraintDoc='
        ),
        'invalid_urls' => array(
            'https://blackfire.io/profiles/2ca1084f-ce66-4073-b2b8-4a82ed7e4c76/other',
            'https://blackfire.io/',
        ),
        'normalize_urls' => array(
            'https://blackfire.io/profiles/2ca1084f-ce66-4073-b2b8-4a82ed7e4c76/embed?settings%5Bdimension%5D=wt&settings()' => 'https://blackfire.io/profiles/2ca1084f-ce66-4073-b2b8-4a82ed7e4c76/graph'
        ),
        'fake_response' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('BlackfireIO', [ 'width' => 480, 'height' => 270]);
    }
}

<?php
/**
 * MedienArchivKuensteTest.php
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
 * Test the MedienArchivKuenste Provider
 */
final class MedienArchivKuensteTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'http://medienarchiv.zhdk.ch/entries/9c8ef1c4-9dcd-4673-abcd-ced03cef213b',
            'https://medienarchiv.zhdk.ch/entries/39f891a8-5b93-46ae-bc8b-d9c940cd8efd',
        ],
        'invalid_urls' => [
            'https://medienarchiv.zhdk.ch',
            'https://medienarchiv.zhdk.ch/entries',
            'https://medienarchiv.zhdk.ch/entries/39f891a8-5b93-46ae-bc8b-d9c940cd8efd/other=stuff',
        ],
        'fake_response' => [
            'type' => 'video|rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('MedienArchivKuenste', [ 'width' => 480, 'height' => 270]);
    }
}

<?php
/**
 * SutoriTest.php
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
 * Test the Sutori Provider
 */
final class SutoriTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.sutori.com/story/fighting-fake-news--3uwdF3nfdyo5rFDxcpNAVSLq',
            'https://www.sutori.com/story/prehistory-and-human-evolution--5BVh1ozQfZe9yUgarPLYewJ4',
            'https://www.sutori.com/story/comma-rules--eSeWQrbyA9Dm6QcfMdpTg2rf',
        ],
        'invalid_urls' => [
            'https://www.sutori.com/',
        ],
        'fake_response' => [
            'type' => 'rich',
            'html' => '<iframe'
        ]
    ];

    public function testProvider()
    {
        $this->validateProvider('Sutori', [ 'width' => 480, 'height' => 270]);
    }
}

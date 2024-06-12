<?php
/**
 * GeniallyTest.php
 *
 * @package Embera
 * @author Matías Minevitz <matias.minevitz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Provider;

use Embera\ProviderTester;

/**
 * Test the Genially Provider
 */
final class GeniallyTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://view.genially.com/66560826885e160014487db5',
            'https://view.genially.com/66560826885e160014487db5/',
            'https://view.genially.com/66560826885e160014487db5/asd',
            'https://view.genial.ly/663449c0ebfbaa0014b24cc9',
            'https://view.genial.ly/663449c0ebfbaa0014b24cc9/',
            'https://view.genial.ly/663449c0ebfbaa0014b24cc9/asd',
        ],
        'invalid_urls' => [
            'https://view.genially.com/66560826885e160014487db',
            'https://view.genially.com/66560826885e160014487db5a',
            'https://view.genially.com/en/66560826885e160014487db5',
            'https://view.genial.ly/en/663449c0ebfbaa0014b24cc9',
            'https://view.genial.ly/663449c0ebfbaa0014b24cc',
            'https://view.genial.ly/663449c0ebfbaa0014b24cc9a',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Genially', ['width' => 480, 'height' => 270]);
    }
}

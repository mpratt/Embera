<?php
/**
 * FormDataTest.php
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
 * Test the FormData Provider
 */
final class FormDataTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://forms.form-data.com/kzunrnvqj61zmnru2wz6b',
        ],
        'invalid_urls' => [
            'https://forms.form-data.com',
            'https://form-data.com/pricing',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('FormData', [ 'width' => 480, 'height' => 270]);
    }
}

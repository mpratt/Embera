<?php
/**
 * VerseDBTest.php
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
 * Test the VerseDB Provider
 */
final class VerseDBTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://versedb.com/title/147199',
            'https://versedb.com/series/1205',
            'https://versedb.com/issue/59',
        ],
        'invalid_urls' => [
            'https://versedb.com',
            'https://versedb.com/title',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('VerseDB', [ 'width' => 480, 'height' => 270]);
    }
}

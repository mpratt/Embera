<?php
/**
 * QuizzTest.php
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
 * Test the Quizz Provider
 */
final class QuizzTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.quizz.biz/quizz-1391715.html',
            'https://www.quizz.biz/quizz-1392009.html',
            'https://www.quizz.biz/quizz-1253477.html',
        ],
        'invalid_urls' => [
            'https://www.quizz.biz',
            'https://www.quizz.biz/quizz-1253477',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('Quizz', [ 'width' => 480, 'height' => 270]);
    }
}

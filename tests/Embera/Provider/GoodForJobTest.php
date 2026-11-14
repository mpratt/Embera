<?php
/**
 * GoodForJobTest.php
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
 * Test the GoodForJob Provider
 */
final class GoodForJobTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://www.good-for-job.jp/slides/0e81c8f7-1e21-478f-9fe8-e60076cc8f61',
            'https://www.good-for-job.jp/slides/31d3ccd1-e6e2-4903-90ca-ab73a57a98c7',
        ],
        'invalid_urls' => [
            'https://www.good-for-job.jp',
            'https://www.good-for-job.jp/slides',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('GoodForJob', [ 'width' => 480, 'height' => 270]);
    }
}

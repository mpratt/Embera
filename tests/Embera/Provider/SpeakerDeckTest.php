<?php
/**
 * SpeakerDeckTest.php
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
 * Test the SpeakerDeck Provider
 */
final class SpeakerDeckTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'https://speakerdeck.com/aratama/elmdetukurusvgedeita',
            'https://speakerdeck.com/dianaarnos/php-e-seguranca-e-possivel-phpconference-br-2019',
            'https://speakerdeck.com/gusantoniassi/desmistificando-o-profiling-no-php-com-cachegrind-e-meminfo',
        ],
        'invalid_urls' => [
            'https://speakerdeck.com/',
            'https://speakerdeck.com/c/education',
        ],
    ];

    public function testProvider()
    {
        $this->validateProvider('SpeakerDeck', [ 'width' => 480, 'height' => 270]);
    }
}

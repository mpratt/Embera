<?php
/**
 * AnimotoTest.php
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
 * Test the AmCharts Provider
 */
final class AnimotoTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'https://www.animoto.com/play/tH6T0044UCwFiALmCxbjgA',
            'http://animoto.com/play/WafRFTXfiG1e7FueGwgm2w/',
        ),
        'invalid_urls' => array(
            'http://animoto.com/features',
            'http://www.animoto.com/play/JzwsBn5FRVxS0qoqcBP5zA/other-stuff',
        ),
        'normalize_urls' => array(
            'http://animoto.com/play/WafRFTXfiG1e7FueGwgm2w/' => 'https://animoto.com/play/WafRFTXfiG1e7FueGwgm2w/',
            'https://animoto.com/play/WafRFTXfiG1e7FueGwgm2w' => 'https://animoto.com/play/WafRFTXfiG1e7FueGwgm2w',
        ),
    );

    public function testProvider()
    {
        $this->validateProvider('Animoto', [ 'width' => 480, 'height' => 270]);
    }
}

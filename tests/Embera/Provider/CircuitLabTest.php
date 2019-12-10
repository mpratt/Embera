<?php
/**
 * CircuitLabTest.php
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
 * Test the circuitlab.com Provider
 */
final class CircuitLabTest extends ProviderTester
{
    protected $tasks = array(
        'valid_urls' => array(
            'http://circuitlab.com/circuit/z79rqm/leds-with-resistor-biasing/',
            'https://www.circuitlab.com/circuit/wt3nym/rlc-resonance/?query=string',
            'https://www.circuitlab.com/circuit/592d96/mosfet-cmos-nand-gate/'
        ),
        'invalid_urls' => array(
            'https://www.circuitlab.com/',
            'https://www.circuitlab.com/forums/',
            'https://circuitlab.com/cz79rqm',
            'https://www.circuitlab.com/circuit/z79rqm/leds-with-resistor-biasing/other/stuff',
        ),
        'normalize_urls' => array(
            'http://circuitlab.com/circuit/4da864/diode-half-wave-rectifier/' => 'https://www.circuitlab.com/circuit/4da864/diode-half-wave-rectifier/',
            'http://circuitlab.com/circuit/z79rqm/leds-with-resistor-biasing?query=string' => 'https://www.circuitlab.com/circuit/z79rqm/leds-with-resistor-biasing',
        ),
        'fake_response' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider()
    {
        $this->validateProvider('CircuitLab', [ 'width' => 480, 'height' => 270]);
    }
}

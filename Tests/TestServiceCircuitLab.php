<?php
/**
 * TestServiceCircuitLab.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceCircuitLab extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://www.circuitlab.com/circuit/e38756/555-timer-as-astable-multivibrator-oscillator/',
            'https://www.circuitlab.com/circuit/fby849/bjt-cascoded-active-load-differential-amplifier-with-cmfb',
            'https://circuitlab.com/circuit/4da864/diode-half-wave-rectifier/',
            'https://circuitlab.com/circuit/z79rqm/leds-with-resistor-biasing',
            'https://www.circuitlab.com/circuit/42475b/mosfet-and-resistor-nand-gate/',
            'https://www.circuitlab.com/circuit/4da864/embed_target/?width=540',
            'https://circuitlab.com/cz79rqm/',
            'https://circuitlab.com/cz79rqm',
        ),
        'invalid' => array(
            'https://www.circuitlab.com/',
            'https://www.circuitlab.com/forums/',
            'https://www.circuitlab.com/circuit/z79rqm/leds-with-resistor-biasing/other/stuff',
        ),
        'normalize' => array(
            'https://circuitlab.com/circuit/4da864/diode-half-wave-rectifier/' => 'https://www.circuitlab.com/circuit/4da864/diode-half-wave-rectifier/',
            'https://circuitlab.com/circuit/z79rqm/leds-with-resistor-biasing' => 'https://www.circuitlab.com/circuit/z79rqm/leds-with-resistor-biasing',
            'https://circuitlab.com/cz79rqm' => 'https://www.circuitlab.com/circuit/z79rqm/',
            'https://circuitlab.com/cz79rqm/' => 'https://www.circuitlab.com/circuit/z79rqm/',
            'https://www.circuitlab.com/circuit/4da864/embed_target/?width=540' => 'https://www.circuitlab.com/circuit/4da864/embed_target/',
        ),
        'fake' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('CircuitLab'); }
}
?>

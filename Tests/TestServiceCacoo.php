<?php
/**
 * TestServiceCacoo.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceCacoo extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://cacoo.com/diagrams/m9uZtizE5I2GkFR6',
            'http://cacoo.com/diagrams/eQe99LVxlYdVCvHA/',
            'https://www.cacoo.com/diagrams/9mG2aVxsBqoH69Qh',
            'https://cacoo.com/diagrams/z4IixDJR44iCqIYw/',
            'http://cacoo.com/diagrams/6NbKDcInDTisv2vU',
            'https://www.cacoo.com/diagrams/ZQ4rgdwXvTZFGQX8',
            'https://cacoo.com/diagrams/zN0Uen7DE0OyCuBC',
            'https://www.cacoo.com/diagrams/dbIT1zRnPJw8lCfj',
            'https://cacoo.com/diagrams/6NbKDcInDTisv2vU/other/stuff',
        ),
        'invalid' => array(
            'https://cacoo.com/lang/en/?ref=logo',
            'https://cacoo.com/lang/en/tour?ref=header',
            'https://cacoo.com/lang/en/faq',
            'https://cacoo.com/signup',
            'https://cacoo.com/',
        ),
        'normalize' => array(
            'https://www.cacoo.com/diagrams/9mG2aVxsBqoH69Qh' => 'https://cacoo.com/diagrams/9mG2aVxsBqoH69Qh',
            'http://www.cacoo.com/diagrams/9mG2aVxsBqoH69Qh/' => 'https://cacoo.com/diagrams/9mG2aVxsBqoH69Qh',
            'https://cacoo.com/diagrams/9mG2aVxsBqoH69Qh/' => 'https://cacoo.com/diagrams/9mG2aVxsBqoH69Qh',
            'https://cacoo.com/diagrams/9mG2aVxsBqoH69Qh/view?w=40&h=80' => 'https://cacoo.com/diagrams/9mG2aVxsBqoH69Qh',
        ),
        'fake' => array(
            'type' => 'rich',
            'html' => '<iframe'
        )
    );

    public function testProvider() { $this->validateProvider('Cacoo'); }
}

<?php
/**
 * LearningAppsTest.php
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
 * Test the LearningApps Provider
 */
final class LearningAppsTest extends ProviderTester
{
    protected $tasks = [
        'valid_urls' => [
            'http://learningapps.org/2965588',
            'https://www.learningapps.org/4823010',
            'https://learningapps.org/view2946634',
        ],
        'invalid_urls' => [
            'https://www.learningapps.org/',
            'https://www.learningapps.org/nonnumericpath',
        ],
    ];

    public function testProvider()
    {

        $travis = (bool) getenv('TRAVIS');
        if ($travis) {
            $this->markTestIncomplete('Disabling this provider since it seems to have problems with the endpoint (LearningApp).');
        }

        $this->validateProvider('LearningApps', [ 'width' => 480, 'height' => 270]);
    }
}

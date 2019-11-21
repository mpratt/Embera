<?php
/**
 * DefaultProviderCollection.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\ProviderCollection;

/**
 * Basically its a wrapper for the ProvidercollectionAdapter but defines the
 * default providers supported by the library
 */
class defaultProviderCollection extends ProviderCollectionAdapter
{
    /** inline {@inheritdoc} */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
        $this->registerProvider([
            'TwentyThreeHq',
            'Adways',
            'Altru',
            'AmCharts',
            'Animoto',
            'Apester',
            'Archivos',
            'Audioboom',
            'AudioClip',
            'Audiomack',
            'Backtracks',
            'BeautifulAI',
            'BlackfireIO',
            'Blogcast',
            'Buttondown',
            'Byzart',
            'Ceros',
            'ChartBlocks',
            'Chirbit',
            'CircuitLab',
            'Clyp',
            'CodeHS',
            'CodePen',
            'Codepoints',
            'CodeSandbox',
            'CollegeHumor',
            'Commaful',
            'Coub',
            'DailyMotion',
            'Deseretnews',
            'Deviantart',
            'Didacte',
            'Digiteka',
            'DocDroid',
            'DotSUB',
            'DTube',
            'EduMedia',
            'Ethfiddle',
            'Eyrie',
            'Facebook',
            'Fader',
            'FaithLifeTV',
            'FITE',
            'MessesInfo',
            'Youtube',
        ]);
    }
}

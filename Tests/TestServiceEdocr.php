<?php
/**
 * TestServiceEdocr.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceEdocr extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.edocr.com/doc/146834/glossary-pdf-terminology',
            'http://www.edocr.com/doc/145567/tax-returns-outsourcing-debt-collection-outsourcing',
            'http://edocr.com/doc/141258/ecopowersupplies-riello-sentinel-dual-ups',
            'http://www.edocr.com/doc/120039/why-what-and-how-supplier-management/',
            'http://www.edocr.com/doc/8/uk-visa-application-form-vaf1/',
            'http://www.edocr.com/doc/8/uk-visa-application-form-guidance-notes?string=stuff',
            'http://www.edocr.com/doc/8/eye-colombo-inspector-general-police-jayantha-wickramaratna',
            'http://www.edocr.com/doc/3773/invest-nottingham-brochure-2',
        ),
        'invalid' => array(
            'http://www.edocr.com/',
            'http://www.edocr.com/explore',
            'http://www.edocr.com/doc/not-numeric/other-stuff-here',
            'http://www.edocr.com/search/node/cuac',
            'http://www.edocr.com/publish',
            'http://www.edocr.com/organisation',
            'http://www.edocr.com/build-your-brand',
        ),
    );

    public function testProvider() { $this->validateProvider('Edocr'); }
}

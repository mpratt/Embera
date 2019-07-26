<?php
/**
 * TestServiceTwitter.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceTwitter extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://twitter.com/ThatKevinSmith/status/361972660344856576',
            'https://twitter.com/RalphGarman/status/363749205367472129/',
            'https://twitter.com/RalphGarman/status/363354457351782401',
            'http://twitter.com/#!RalphGarman/status/363326025834299393',
            'https://twitter.com/#!RalphGarman/status/362589356495605762/',
            'https://twitter.com/#!RalphGarman/status/362279899639197696'
        ),
        'invalid' => array(
            'https://twitter.com/RalphGarman/statuses/363354457351782401',
            'https://twitter.com/#!RalphGarman/status/wordswordswords/',
            'https://twitter.com/status/363749205367472129/',
            'https://twitter.com/RalphGarman/363749205367472129/',
            'https://twitter.com/#!363749205367472129/',
            'https://twitter.com/363749205367472129/',
            'https://twitter.com/',
        ),
        'normalize' => array(
            'https://twitter.com/#!RalphGarman/status/362589356495605762/' => 'https://twitter.com/RalphGarman/status/362589356495605762',
            'https://twitter.com/#!RalphGarman/status/362589356495605762' => 'https://twitter.com/RalphGarman/status/362589356495605762'
        )
    );

    public function testProvider() { $this->validateProvider('Twitter'); }
}

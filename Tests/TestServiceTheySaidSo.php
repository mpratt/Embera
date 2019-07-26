<?php
/**
 * TestServiceTheySaidSo.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceTheySaidSo extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://theysaidso.com/i/f5XZNjeYgxdZOSnYWQAHbQeF',
            'https://theysaidso.com/quote/Ox8voVa3kvS8upOHPmuWUweF#',
            'https://theysaidso.com/quote/QaFPskqQUabgcmOWVREIdAeF?query=string',
            'https://theysaidso.com/i/e798C8EEnAycJesx_MWDJAeF/',
            'http://theysaidso.com/i/f5XZNjeYgxdZOSnYWQAHbQeF',
            'https://www.theysaidso.com/i/GuLDqbvqaibMX_2Rl2sR4weF',
        ),
        'invalid' => array(
            'https://theysaidso.com/qod#',
            'https://theysaidso.com',
            'https://theysaidso.com/i/image/GuLDqbvqaibMX_2Rl2sR4weF',
            'https://theysaidso.com/c/1#',
            'http://theysaidso.com/i/f5XZNjeYgxdZOSnYWQAHbQeF/other-path',
        )
    );

    /**
     * @large
     */
    public function testProvider() { $this->validateProvider('TheySaidSo'); }
}

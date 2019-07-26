<?php
/**
 * TestServiceGettyImages.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceGettyImages extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'http://www.gettyimages.com/detail/photo/dog-in-car-royalty-free-image/a0200-000024?suri=1',
            'http://www.gettyimages.com/detail/photo/chocolate-labrador-retriever-rolling-on-lawn-royalty-free-image/73117582',
            'http://www.gettyimages.com/detail/photo/two-underwater-female-nude-dancers-high-res-stock-photography/160002618',
            'http://gty.im/482126281',
            'http://gty.im/137700196/',
            'http://www.gettyimages.com/detail/photo/friends-toasting-with-cocktails-in-nightclub-royalty-free-image/139801239',
        ),
        'invalid' => array(
            'http://www.gettyimages.com/detail/photo/friends-toasting-with-cocktails-in-nightclub-royalty-free-image/139801239/other-stuff',
            'http://gty.im/137700196/other',
            'http://www.gettyimages.com/',
            'http://www.gettyimages.com/editorialimages/news',
            'http://www.gettyimages.com/EditorialFootage/Recentevents?parentEventId=150825084&isource=USA_NewsRot_ElectionVideo',
        ),
        'normalize' => array(
            'http://www.gettyimages.com/detail/photo/dog-in-car-royalty-free-image/a0200-000024?suri=1' => 'http://gty.im/a0200-000024',
            'http://www.gettyimages.com/detail/photo/chocolate-labrador-retriever-rolling-on-lawn-royalty-free-image/73117582' => 'http://gty.im/73117582',
            'http://www.gettyimages.com/detail/photo/two-underwater-female-nude-dancers-high-res-stock-photography/160002618/' => 'http://gty.im/160002618',
        ),
    );

    public function testProvider() { $this->validateProvider('GettyImages'); }
}

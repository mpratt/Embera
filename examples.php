<?php
/**
 * Examples.php
 *
 * @package Example
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require './Lib/Embera/Autoload.php';

$text = 'Hi, i just saw this video http://www.dailymotion.com/video/xxwxe1_harlem-shake-de-los-simpsons_fun';
$embera = new \Embera\Embera();
echo $embera->autoEmbed($text) . "\n";
echo "================================ \n";

$config = array('width' => 300);
$text = 'Check this video out http://vimeo.com/groups/shortfilms/videos/66185763';
$embera = new \Embera\Embera($config);
echo $embera->autoEmbed($text) . "\n";
echo "================================ \n";

$config = array('oembed' => false);
$text = 'http://vimeo.com/groups/shortfilms/videos/66185763 http://www.flickr.com/photos/bees/8597283706/in/photostream';
$embera = new \Embera\Embera($config);
echo $embera->autoEmbed($text) . "\n";
echo "================================ \n";

$config = array('allow' => array('Youtube', 'Vimeo'));
$text = 'http://vimeo.com/groups/shortfilms/videos/66185763 http://www.flickr.com/photos/bees/8597283706/in/photostream http://youtube.com/watch?v=J---aiyznGQ';
$embera = new \Embera\Embera($config);
echo $embera->autoEmbed($text) . "\n";
echo "================================ \n";

$config = array('deny' => array('Youtube', 'Vimeo'));
$text = 'http://dailymotion.com/video/xp30q9_bmw-serie3-2012-en-mexico_auto http://vimeo.com/groups/shortfilms/videos/66185763  http://youtube.com/watch?v=J---aiyznGQ';
$embera = new \Embera\Embera($config);
echo $embera->autoEmbed($text) . "\n";
echo "================================ \n";

$config = array('use_embed_prefix' => true);
$text = 'http://dailymotion.com/video/xp30q9_bmw-serie3-2012-en-mexico_auto embed://vimeo.com/groups/shortfilms/videos/66185763  http://youtube.com/watch?v=J---aiyznGQ';
$embera = new \Embera\Embera($config);
echo $embera->autoEmbed($text) . "\n";
echo "================================ \n";

$url = 'http://dailymotion.com/video/xp30q9_bmw-serie3-2012-en-mexico_auto';
$embera = new \Embera\Embera();
print_r($embera->getUrlInfo($url)) . "\n";
echo "================================ \n";

$urls = array(
    'http://vimeo.com/groups/shortfilms/videos/66185763',
    'http://vimeo.com/47360546',
    'http://www.flickr.com/photos/bees/8597283706/in/photostream',
    'http://youtube.com/watch?v=J---aiyznGQ'
);

$embera = new \Embera\Embera();
print_r($embera->getUrlInfo($urls)) . "\n";
echo "================================ \n";
echo "End of Examples - You happy? \n";
?>

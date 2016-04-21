<?php
/**
 * Facebook.php
 *
 * @package Providers
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Providers;

/**
 * The Facebook Provider (Public posts and videos)
 * @link https://www.facebook.com
 * @link https://developers.facebook.com/docs/plugins/oembed-endpoints
 */
class Facebook extends \Embera\Adapters\Service
{
    /**
     * inline {@inheritdoc}
     * This Provider is kind of special, because it uses different oembed endpoints
     * based on the given url. The default value of the endpoint is null and is set
     * during the process of getting the url information.
     */
    protected $apiUrl = null;

    /** Patterns that match posts urls */
    protected $postPatterns = array(
        /**
         * https://www.facebook.com/{page-name}/posts/{post-id}
         * https://www.facebook.com/{username}/posts/{post-id}
         * https://www.facebook.com/{username}/activity/{activity-id}
         *
         * Undocumented: https://www.facebook.com/{username}/photos/{photo-id}
         */
        '~facebook\.com/(?:[^/]+)/(?:posts|activity|photos)/(?:[^/]+)/?~i',

        /**
         * https://www.facebook.com/notes/{username}/{note-url}/{note-id}
         */
        '~facebook\.com/notes/(?:[^/]+)/(?:[^/]+)/(?:[^/]+)/?~i',

        /**
         * https://www.facebook.com/photo.php?fbid={photo-id}
         * https://www.facebook.com/permalink.php?story_fbid={post-id}
         */
        '~facebook\.com/(?:photo|permalink)\.php\?(?:(story_)?fbid)=(?:[^ ]+)~i',

        /**
         * https://www.facebook.com/photos/{photo-id}
         * https://www.facebook.com/questions/{question-id}
         */
        '~facebook\.com/(?:photos|questions)/(?:[^/ ]+)/?~i',

        /**
         * NOTE: This url scheme is stated to be supported, however
         * I havent found any example that work. I'm leaving it
         * but I suspect that its not valid anymore.. we know how
         * facebook is with API's :/
         *
         * However in order to be really complaint with the documentation
         * I'm leaving the pattern.
         *
         * https://www.facebook.com/media/set?set={set-id}
         */
         '~facebook\.com/media/set/?\?set=(?:[^/ ]+)~i',
    );


    /** Patterns that match video urls */
    protected $videoPatterns = array(
        /**
         * https://www.facebook.com/{page-name}/videos/{video-id}/
         * https://www.facebook.com/{username}/videos/{video-id}/
         */
        '~facebook\.com/(?:[^/]+)/videos/(?:[^/]+)/?~i',

        /**
`        * https://www.facebook.com/video.php?id={video-id}
         * https://www.facebook.com/video.php?v={video-id}
         */
        '~facebook\.com/video\.php\?(?:id|v)=(?:[^ ]+)~i',
    );

    /** inline {@inheritdoc} */
    protected function validateUrl()
    {
        $this->url->convertToHttps();
        return ($this->urlMatchesPattern(array_merge($this->postPatterns, $this->videoPatterns)));
    }

    /**
     * Checks if $this->url matches the given list of patterns
     *
     * @param array $patternList Array with regex
     * @return bool
     */
    protected function urlMatchesPattern(array $patternList)
    {
        foreach ($patternList as $p) {
            if (preg_match($p, $this->url)) {
                return true;
            }
        }

        return false;
    }

    /**
     * inline {@inheritdoc}
     *
     * Im overriding this method because I need to set the
     * endpoint based on the given url. By default we're always assuming
     * it is a post url unless we have a specific video match.
     *
     * Why? Because we already did url validation and We dont want
     * to loop over both sets of patterns all over again right? So
     * we just need to loop over the smaller one ;)
     */
    public function getInfo()
    {
        $this->apiUrl = 'https://www.facebook.com/plugins/post/oembed.json/';
        if ($this->urlMatchesPattern($this->videoPatterns)) {
            $this->apiUrl = 'https://www.facebook.com/plugins/video/oembed.json/';
        }

        return parent::getInfo();
    }

    /**
     * inline {@inheritdoc}
     *
     * Need to modify the html response, to use the iframe instead.
     * The html returned by facebook always adds the javascript code
     * and the famous <div id="fb-root"></div>.
     *
     * When embedding multiple links, the code seems to conflict and doesnt
     * embed properly
     */
    protected function modifyResponse(array $response = array())
    {
        if (!empty($response['html'])) {
            $iframe = '<iframe id="embera-iframe-{md5}" class="embera-facebook-iframe" src="https://www.facebook.com/plugins/post.php?href={url}&width={width}&height={height}&show_text=true&appId" width="{width}" height="{height}"" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>';

            if (!empty($response['height'])) {
                $height = $response['height'];
            } else {
                $height = min(680, (int) ($response['width'] + 100));
            }

            $table = array(
                '{url}' => rawurlencode($this->url),
                '{md5}' => substr(md5($this->url), 0, 5),
                '{width}' => $response['width'],
                '{height}' => $height,
            );

            // Backup the real response
            $response['raw']['html'] = $response['html'];

            // Replace the html response
            $response['html'] = str_replace(array_keys($table), array_values($table), $iframe);
        }

        return $response;
    }
}

?>

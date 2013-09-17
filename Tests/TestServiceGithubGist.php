<?php
/**
 * TestServiceGithubGist.php
 *
 * @package Tests
 * @author Michael Pratt <pratt@hablarmierda.net>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'TestProviders.php';

class TestServiceGithubGist extends TestProviders
{
    protected $urls = array(
        'valid' => array(
            'https://gist.github.com/mpratt/3177700',
            'https://gist.github.com/mpratt/5671743/',
            'https://gist.github.com/nad2000/6547920',
            'https://gist.github.com/mojavelinux/6547924#file-git-user-manual-adoc',
            'https://gist.github.com/callaght/6547921#file-issueviewcontroller-m',
            'https://gist.github.com/callaght/6547921#file-logonviewcontroller-h',
            'https://gist.github.com/ashaw/6308796',
            'https://gist.github.com/mpratt/3177700#file-database-txt'
        ),
        'invalid' => array(
            'https://gist.github.com/mpratt',
            'https://gist.github.com/',
            'https://gist.github.com/discover/',
        ),
        'normalize' => array(
            'https://gist.github.com/mpratt/3177700' => 'https://gist.github.com/3177700',
            'https://gist.github.com/733951' => 'https://gist.github.com/733951',
            'https://gist.github.com/LJPH/6308712#file-comet_-idea_description-html' => 'https://gist.github.com/6308712',
        ),
        'fake' => array(
            'type' => 'rich',
            'html' => '<script'
        )
    );

    public function testProvider()
    {
        $this->markTestIncomplete('The Github-Gist Oembed Provider, is down at the time of this test');

        $this->validateProvider('GithubGist');
    }
}
?>

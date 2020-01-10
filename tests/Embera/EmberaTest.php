<?php
/**
 * Embera.php
 *
 * @package Tests
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera;

use PHPUnit\Framework\TestCase;

class EmberaTest extends TestCase
{
    public function testEmberaBasic()
    {
        $config = [
            'https_only' => false,
            'fake_responses' => Embera::ALLOW_FAKE_RESPONSES,
            'width' => 400,
            'height' => 400,
        ];

        $urls = [
            'http://www.youtube.com/watch?v=WtPiGYsllos&index=1',
            'https://m.youtube.com/watch?v=mghhLqu31cQ',
        ];

        $embera = new Embera($config);
        $data = $embera->getUrlData($urls);

        foreach ($data as $d) {
            $this->assertNotEmpty($d['provider_name']);
        }
    }

    public function testEmberaFakeResponse()
    {
        $config = [
            'fake_responses' => Embera::ONLY_FAKE_RESPONSES,
            'width' => 400,
            'height' => 400,
        ];

        $urls = [
            'http://www.youtube.com/watch?v=WtPiGYsllos&index=1',
            'https://m.youtube.com/watch?v=mghhLqu31cQ',
        ];

        $embera = new Embera($config);
        $data = $embera->getUrlData($urls);

        foreach ($data as $d) {
            $this->assertEquals(1, $d['embera_using_fake_response']);
        }
    }

    public function testEmberaErrorMethodsAndAutoEmbedInput()
    {
        $config = [
            'fake_responses' => Embera::ONLY_FAKE_RESPONSES,
            'width' => 400,
            'height' => 400,
        ];

        $embera = new Embera($config);
        $embera->autoEmbed(['Invalid parameter']);

        $this->assertTrue($embera->hasErrors());
        $this->assertNotEmpty($embera->getLastError());
        $this->assertNotEmpty($embera->getErrors());
    }

    public function testEmberaAutoEmbedText()
    {
        $config = [
            'fake_responses' => Embera::ONLY_FAKE_RESPONSES,
            'width' => 400,
            'height' => 400,
        ];

        $urls = [
            'https://youtube.com/watch?v=mghhLqu31cQ',
            'https://youtube.com/watch?v=wB3sjAIARIY',
        ];

        $text = 'Check this video out ' . $urls[0] . ' I Love it, just like this one ' . $urls[1];

        $embera = new Embera($config);
        $autoEmbedText = $embera->autoEmbed($text);
        $embedResponse = $embera->getUrlData($urls);

        $this->assertStringContainsString($embedResponse[$urls[0]]['html'], $autoEmbedText);
        $this->assertStringContainsString($embedResponse[$urls[1]]['html'], $autoEmbedText);
    }

    public function testEmberaFilters()
    {
        $config = [
            'fake_responses' => Embera::ONLY_FAKE_RESPONSES,
            'width' => 400,
            'height' => 400,
        ];

        $embera = new Embera($config);

        $url = 'https://youtube.com/watch?v=mghhLqu31cQ';
        $responseBeforeFilters = $embera->getUrlData($url);

        $embera->addFilter(static function ($response) {
            if (!empty($response['html'])) {
                $response['html'] = str_replace('iframe', 'dframe', $response['html']);
            }

            return $response;
        });

        $embera->addFilter(static function ($response) {
            if (!empty($response['html'])) {
                $response['html'] = str_replace('dframe', 'xframe', $response['html']);
            }

            return $response;
        });

        $responseAfterFilters = $embera->getUrlData($url);
        $this->assertEquals($responseAfterFilters[$url]['html'], str_replace('iframe', 'xframe', $responseBeforeFilters[$url]['html']));
    }

}

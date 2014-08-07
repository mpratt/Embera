<?php
/**
 * Setup the environment
 */
date_default_timezone_set('UTC');
if (file_exists(__DIR__ . '/../vendor/autoload.php'))
    require __DIR__ . '/../vendor/autoload.php';
else
    require __DIR__ . '/../Lib/Embera/Autoload.php';

/**
 * HttpRequest Mockup
 * @codeCoverageIgnore
 */
class MockHttpRequest extends \Embera\HttpRequest
{
    public $response;
    public function fetch($url, array $params = array())
    {
        $url = true;
        return $this->response;
    }
}

/**
 * A custom Service
 */
class CustomService extends \Embera\Adapters\Service
{
    protected $apiUrl = 'http://my-custom-service.com/oembed.json';
    public function validateUrl()
    {
        return preg_match('~customservice\.com/([0-9]+)~i', $this->url);
    }
}

/**
 * Oembed Mockup
 * @codeCoverageIgnore
 */
class MockOembed extends \Embera\Oembed
{
    public function getResourceInfo($behaviour, $apiUrl, $url, array $params = array())
    {
        $behaviour = $apiUrl = $url = $params = true;
        return array();
    }
}
?>

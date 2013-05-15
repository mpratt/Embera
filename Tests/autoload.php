<?php
/**
 * Setup the environment
 */
date_default_timezone_set('America/Bogota');
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
    public function fetch($url = '') { return $this->response; }
}

/**
 * Oembed Mockup
 * @codeCoverageIgnore
 */
class MockOembed extends \Embera\Oembed
{
    public function getResourceInfo($apiUrl, $url, array $params = array()) { return array(); }
}
?>

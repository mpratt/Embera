<?php
date_default_timezone_set('America/Bogota');
if (file_exists(__DIR__ . '/../vendor/autoload.php'))
    require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../Lib/Embera/Autoload.php';

/**
 * A Mock Service
 * @codeCoverageIgnore
 */
class MockService extends \Embera\Adapters\Service
{
    protected $valid = true;
    public function validateUrl(){ return $this->valid; }
    public function __set($k, $v) { $this->{$k} = $v; }
}

?>

<?php
date_default_timezone_set('UTC');

require __DIR__.'/../vendor/autoload.php';

if (!class_exists('\\PHPUnit_Framework_TestCase', true)) {
    class_alias('\\PHPUnit\\Framework\\TestCase', '\\PHPUnit_Framework_TestCase');
}

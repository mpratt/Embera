<?php
spl_autoload_register(static function ($class) {
    if (false === stripos($class, 'Embera')) {
        return;
    }

    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

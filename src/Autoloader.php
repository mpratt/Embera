<?php
spl_autoload_register(static function ($class) {
    if (!preg_match('~Embera~i', $class)) {
        return ;
    }

    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

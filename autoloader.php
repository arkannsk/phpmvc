<?php
spl_autoload_register(function ($class_name) {
    $fullClassName = $class_name . '.php';
    $fullClassName = preg_replace(
        '/\\\/i',
        DIRECTORY_SEPARATOR,
        $fullClassName
    );
    if(file_exists($fullClassName)) {
        require realpath($fullClassName);
    }
});
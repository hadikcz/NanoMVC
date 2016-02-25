<?php
spl_autoload_register('tryLoad');

function tryLoad($class) {
    $paths = array('presenter', 'model', 'service');
    foreach ($paths as $path) {
        $pathToFile =  APP_DIR  . $path . '/' . $class . '.php';
        if (file_exists($pathToFile)) {
            require $pathToFile;
        }
    }
}

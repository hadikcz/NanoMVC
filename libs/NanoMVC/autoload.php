<?php
/**
 * @author Hadik <hadikcze@gmail.com>
 */

spl_autoload_register('tryLoad');

function tryLoad($class) {
    $parts = explode('\\',$class);
    $class = end($parts);
    $paths = array(APP_DIR . 'presenter', APP_DIR . 'model', APP_DIR . 'service', LIBS_DIR . 'NanoMVC');
    foreach ($paths as $path) {
        $pathToFile =   $path . '/' . $class . '.php';
        if (file_exists($pathToFile)) {
            require $pathToFile;
        }
    }
    
    
}

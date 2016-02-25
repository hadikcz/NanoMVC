<?php
// Constants
define('ROOT_DIR', __DIR__);
define('APP_DIR', ROOT_DIR . '/app/');
define('TEMP_DIR', ROOT_DIR . '/temp/');
define('LIBS_DIR', ROOT_DIR . '/libs/');

// Autoloader
require LIBS_DIR . '/NanoMVC/autoload.php';

// Debugger
use Tracy\Debugger;
require LIBS_DIR . '/Tracy/tracy.php';
Debugger::enable();

require APP_DIR . '/config.php';


$router = new NanoMvc\Router();
$router->run();
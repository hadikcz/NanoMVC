<?php
use Tracy\Debugger;

// Constants
define('ROOT_DIR', __DIR__);
define('APP_DIR', ROOT_DIR . '/app/');
define('TEMP_DIR', ROOT_DIR . '/temp/');

// Autoloader
require APP_DIR . '/service/autoload.php';

// Debugger
require ROOT_DIR . '/libs/tracy/tracy.php';
Debugger::enable();

require APP_DIR . '/config.php';

$test = new TestModel();
$test->foo();
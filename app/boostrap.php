<?php
// Autoloader
require LIBS_DIR . '/NanoMVC/autoload.php';

// Debugger
use Tracy\Debugger;
require LIBS_DIR . '/Tracy/tracy.php';
Debugger::enable();

// Load config
require APP_DIR . '/config.php';

$application = new NanoMVC\Application();
$application->run();

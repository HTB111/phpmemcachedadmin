<?php
# Headers
header('Content-type: text/html;');
header('Cache-Control: no-cache, must-revalidate');

# Constants declaration
define('CURRENT_VERSION', '1.3.0');

# XSS / User input check
foreach ($_REQUEST as $index => $data) {
    $_REQUEST[$index] = htmlentities($data, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

# Autoloader
spl_autoload_register(function($class) {
    require_once str_replace('_', DIRECTORY_SEPARATOR, $class) . '.php';
});

# Loading ini file
$_ini = Library_Configuration_Loader::singleton();

# Date timezone
date_default_timezone_set('Europe/Paris');


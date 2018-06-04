<?php
/**
 * This file will keep all the public constants of the application
 */

// APP_ROOT
define("APP_ROOT", dirname(dirname(__FILE__)));

define("PROJECT_NAME", "shareposts2");

// URL_ROOT (You dont want lots of temp vars in the global scope)
define("URL_ROOT", (function() {
    $protocol    = isset($_SERVER['HTTPS']) ? 'https' : 'http';
    $serverName  = $_SERVER['HTTP_HOST'];
    $projectName = PROJECT_NAME;
    $urlRoot     = $protocol . '://' . $serverName . '/' . $projectName;
    $urlRoot     = rtrim($urlRoot, '/');
    return $urlRoot;
})() );

// Request Dispatcher
define("DEFAULT_CONTROLLER", "PageController");
define("DEFAULT_ACTION", "index");
define("DEFAULT_PARAMS", []);

#################################################################
###                    Error Pages Path                       ###
#################################################################
define("PAGE_NOT_FOUND", APP_ROOT . "/views/error/not-found.php");
define("METHOD_NOT_ALLOWED", APP_ROOT . "/views/error/method-not-allowed.php");
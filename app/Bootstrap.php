<?php 
/**
 * This is the file that will have all the requires needed by the application
 */

# Config
require_once "config/Database.php";
require_once "config/Config.php";
require_once "config/Content.php";

# Helpers
require_once "helpers/ErrorCss.php";
require_once "helpers/FlashMessage.php";
require_once "helpers/SessionManager.php";

# Core libs
require_once "lib/RequestDispatcher.php";

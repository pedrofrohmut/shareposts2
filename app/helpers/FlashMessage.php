<?php
/**
 * 
 * Get and Set Flash Messages: Messages that are set in the session and are deleted once it is called
 * 
 * All the flash messages will be stored in the $_SESSION['flashMessages']
 * 
 * All the work must be done in here. Out side this helper you must only get, set and style
 * 
 */

 // TODO: remake it as a class with methods and add require_once before the session_start() (cuz serialization problems)

function setFlashMessage($msg, $class)
{
    // Initializes the assoc_array
    if (!isset($_SESSION['flashMessages'])) {
        $_SESSION['flashMessages'] = [];
    }

    // Add elem
    $_SESSION['flashMessages'][$msg] = "alert-". $class ." flash-message";
}


function getFlashMessage()
{
    require_once APP_ROOT . "/views/helpers/flash-messages.php";
}

// setFlashMessage("Hello World!", "danger"); #DEBUG
// setFlashMessage("Another World!", "success"); #DEBUG
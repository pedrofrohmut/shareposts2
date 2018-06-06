<?php 
/**
 * 
 * This file is the entry point of our application
 * 
 * 1. It mains function is to call the Core of the MVC Engine: lib/RequestDispatcher
 * 
 * 2. The secondary function is to have all the requires in the application using
 * the require to the Bootstrap file
 * 
 * 3. Require the includes of the application to avoid the repetitive task of requiring
 * them in each view of the application
 * 
 */
session_start();

require_once "../app/Bootstrap.php";

require_once APP_ROOT . "/views/inc/header.php";

// loads the framework's core & Content of the page
new RequestDispatcher();

// Includes the footer to all pages
require_once APP_ROOT . "/views/inc/footer.php";
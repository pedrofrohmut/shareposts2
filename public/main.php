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
 * 3. Start the session and requires the necessary class for the session before starting 
 * it. So it can unserialize objects 
 *  
 */
require_once "../app/Bootstrap.php";

SessionManager::start();

// loads the framework's core
new RequestDispatcher();
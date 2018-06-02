<?php
/**
 * 
 * Application Request Dispatcher and URL Processor
 * Extracts the controller, action and params from the url
 * URL FORMAT - shareposts2/<controller>/<action>/<param1>/<param2>....
 * 
 */

// define("DEFAULT_CONTROLLER", "PagesController");
// define("DEFAULT_ACTION", "index");
// define("DEFAULT_PARAMS", []);

class RequestDispatcher 
{    
    // protected $currentController = "PagesController";
    // protected $currentAction = "index";
    // protected $params = [];
 
    public function __construct() 
    {
        // Test_URL: /testController/testAction/param1/param2

        $url = $this->getUrl();

        $exploded = explode("/", $url);

        // Controller (the first part of the url)
        if (isset($exploded[0]) && $exploded[0] !== "") {
            $controller = $exploded[0];
            $controller = ucfirst($controller);
            $controller .= "Controller"; 
        } else {
            $controller = DEFAULT_CONTROLLER;
        }

        // Validate and instantiate the controller
        if (!file_exists(APP_ROOT . "/controllers/$controller.php")) {
            $controller = DEFAULT_CONTROLLER;
        }

        // Requires and instantiate the right controller
        require_once APP_ROOT . "/controllers/$controller.php";
        $controllerObj = new $controller();

        // Action (The second part of the url)
        if (isset($exploded[1]) && $exploded[1] !== "") {
            $action = $exploded[1];
            $action = lcfirst($action);
        } else {
            $action = DEFAULT_ACTION;
        }

        // Validate the method
        if (!method_exists($controllerObj, $action)) {
            $action = DEFAULT_ACTION;
        }

        // Params (The params are the 2nd and further args of the url)
        if (count($exploded) > 2) {
            $params = array_slice($exploded, 2);
        } else {
            $params = DEFAULT_PARAMS;
        }


        // echo "<br><br><hr>Controller: $controller; Action: $action;<hr>"; #DEBUG

        // Calls the method (method_name = $action) of the object instantiate as
        // (object_instance = $controllerObj) with the params (array_of_params = $params)
        call_user_func_array([$controllerObj, $action], $params);
    }

    private function getUrl() 
    {
        $url = isset($_GET['url']) ? $_GET['url'] : "";
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = trim($url, "/");
        $url = trim($url);
        return $url;
    }

}
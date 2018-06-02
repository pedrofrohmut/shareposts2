<?php
/**
 * 
 * Application Request Dispatcher and URL Processor
 * Extracts the controller, action and params from the url
 * URL FORMAT - shareposts2/<controller>/<action>/<param1>/<param2>....
 * 
 */


class RequestDispatcher 
{    
    public function __construct() 
    {
        $url = $this->getUrl();

        // loads the default values if the url is not defined
        if ($url === '') {
            require_once APP_ROOT . "/controllers/". DEFAULT_CONTROLLER .".php";
            $controller = DEFAULT_CONTROLLER;
            $action = DEFAULT_ACTION;
            $params = DEFAULT_PARAMS;
            call_user_func_array([new $controller(), $action], $params);
            return;
        }

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

        call_user_func_array([$controllerObj, $action], $params);
    }

    private function getUrl() 
    {
        if (!isset($_GET['url'])) {
            return "";
        }

        $url = filter_var($_GET['url'], FILTER_SANITIZE_URL);
        $url = trim($url, "/");

        return $url;
    }

}
<?php
/**
 * Base Controller
 * Load the models and views
 */
class Controller
{
    public function __construct() { }

    /**
     * Loads the content of the layout with a view from the given path 
     * with the data as a context
     */
    public function loadView($viewPath, $data)
    {
        $viewPath = APP_ROOT . "/views/$viewPath.php";

        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            require_once PAGE_NOT_FOUND;
        }

    }

    protected function methodNotAllowed()
    {
        require_once METHOD_NOT_ALLOWED;
    }
}
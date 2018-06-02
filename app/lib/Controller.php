<?php
/**
 * Base Controller
 * Load the models and views
 */
class Controller
{
    public function __construct() 
    {

    }

    /**
     * Returns a new instance of a model for a given name if it exists
     */
    public function loadModel($modelPath)
    {
        $modelPath = APP_ROOT . "/models/$modelPath.php";
        
        if (!file_exists($modelPath)) {
            die("<br><br>No model file found.");
        }
        
        $model = basename($modelPath, ".php");

        require_once $modelPath;
        
        return new $model();

    }

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
}
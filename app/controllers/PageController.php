<?php
require_once APP_ROOT . "/lib/Controller.php";
require_once APP_ROOT . "/services/PostService.php";
require_once APP_ROOT . "/services/PageService.php";

/**
 * 1. This class have the routes as it methods (Routes File)
 * 2. It controls WHO can access WHAT (Access Control)
 * 3. Chooses the right service for each situation 
 * 4. Process the service response to load the right view with the right content
 */
class PageController extends Controller
{
    public function __construct() { }

    public function index()
    {
        switch ($_SERVER['REQUEST_METHOD'])
        {
            case 'GET':
                if (SessionManager::isUserLoggedIn()) {
                    $serviceResponse = ( new PostService() )->indexOnGet();    
                } else {
                    $serviceResponse = ( new PageService() )->indexOnGet();
                }
                $this->loadView($serviceResponse->getViewPath(), $serviceResponse->getData());
                break;
            default:
                $this->methodNotAllowed();
        }
    }

    public function about()
    {
        switch ($_SERVER['REQUEST_METHOD'])
        {
            case 'GET':
                $serviceResponse = ( new PageService() )->aboutOnGet();
                $this->loadView($serviceResponse->getViewPath(), $serviceResponse->getData());
                break;
            default:
                $this->methodNotAllowed();
        }
    }
}
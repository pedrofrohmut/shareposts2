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
class PostController extends Controller 
{
    public function __construct()
    {
        
    }

    public function index() 
    {
        switch ($_SERVER['REQUEST_METHOD'])
        {
            case 'GET':
                if (SessionManager::isUserLoggedIn()) {
                    $serviceResponse = ( new PostService() )->indexOnGet();
                } else {
                    FlashMessage::setUserNotLoggedInMessage();
                    $serviceResponse = ( new PageService() )->indexOnGet();
                }
                $this->loadView($serviceResponse->getViewPath(), $serviceResponse->getData());
                break;
            default:
                $this->methodNotAllowed();
        }
    }

    public function add()
    {
        switch ($_SERVER['REQUEST_METHOD'])
        {
            case 'GET':
                if (SessionManager::isUserLoggedIn()) {
                    $serviceResponse = ( new PostService() )->addOnGet();
                } else {
                    FlashMessage::setUserNotLoggedInMessage();
                    $serviceResponse = ( new PageService() )->indexOnGet();
                }
                $this->loadView($serviceResponse->getViewPath(), $serviceResponse->getData());
                break;
            case 'POST':
                if (SessionManager::isUserLoggedIn()) {
                    $serviceResponse = ( new PostService() )->addOnPost();
                } else {
                    FlashMessage::setUserNotLoggedInMessage();
                    $serviceResponse = ( new PageService() )->indexOnGet();
                }
                $this->loadView($serviceResponse->getViewPath(), $serviceResponse->getData());
                break;
            default:
                $this->methodNotAllowed();
        }
    }

    public function show(int $id)
    {
        switch ($_SERVER["REQUEST_METHOD"])
        {
            case "GET":
                if (SessionManager::isUserLoggedIn()) {
                    $serviceResponse = ( new PostService(["postId" => $id]) )->showOnGet();
                } else {
                    FlashMessage::setUserNotLoggedInMessage();
                    $serviceResponse = ( new PageService() )->indexOnGet();
                }
                $this->loadView($serviceResponse->getViewPath(), $serviceResponse->getData());
                break;
            default:
                $this->methodNotAllowed();
        }
    }

    public function edit(int $id)
    {
        switch ($_SERVER["REQUEST_METHOD"])
        {
            case "GET":
                if (SessionManager::isUserLoggedIn()) {
                    $serviceResponse = ( new PostService(["postId" => $id]) )->editOnGet();
                } else {
                    FlashMessage::setUserNotLoggedInMessage();
                    $serviceResponse = ( new PageService() )->indexOnGet();
                }
                $this->loadView($serviceResponse->getViewPath(), $serviceResponse->getData());
                break;
            case "POST":
                if (SessionManager::isUserLoggedIn()) {
                    $serviceResponse = ( new PostService(["postId" => $id]) )->editOnPost();
                } else {
                    FlashMessage::setUserNotLoggedInMessage();
                    $serviceResponse = ( new PageService() )->indexOnGet();
                }
                $this->loadView($serviceResponse->getViewPath(), $serviceResponse->getData());
                break;
            default:
                $this->methodNotAllowed();
        }
    }

    public function delete(int $id)
    {
        switch ($_SERVER["REQUEST_METHOD"])
        {
            case "POST":
                if (SessionManager::isUserLoggedIn()) {
                    $serviceResponse = ( new PostService(["postId" => $id]) )->deleteOnPost();
                } else {
                    FlashMessage::setUserNotLoggedInMessage();
                    $serviceResponse = ( new PageService() )->indexOnGet();
                }
                $this->loadView($serviceResponse->getViewPath(), $serviceResponse->getData());
                break;
            default:
                $this->methodNotAllowed();
        }
    }
}
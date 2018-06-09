<?php
require_once APP_ROOT . "/lib/Controller.php";
require_once APP_ROOT . "/services/UserService.php";
require_once APP_ROOT . "/services/ServiceResponse.php";

/**
 * 1. This class have the routes as it methods (Routes File)
 * 2. It controls WHO can access WHAT (Access Control)
 * 3. Chooses the right service for each situation 
 * 4. Process the service response to load the right view with the right content
 */
class UserController extends Controller 
{
    public function __construct()
    {

    }

    /**
     * Default action of the controller
     * When user is logged in redirects to the user profile. Or redirects to the login page otherwise.
    */
    public function index()
    {
        // TODO: change this to standart
        die(" - TODO: implement this method.");
    }

    /**
     * onGet  = Loads the login form
     * onPost = on login form submit send the data to the service an loads the right view
     */
    public function login()
    {
        switch ($_SERVER['REQUEST_METHOD'])
        {
            case 'GET': # Load the form
                if (SessionManager::isUserLoggedIn()) {
                    FlashMessage::setUserAlreadyLoggedInMessage();
                    $serviceResponse = ( new PageService() )->indexOnGet();
                } else {
                    $serviceResponse = ( new UserService() )->loginOnGet();
                }
                $this->loadView($serviceResponse->getViewPath(), $serviceResponse->getData());
                break;
            case 'POST': # Submit the form
                if (SessionManager::isUserLoggedIn()) {
                    FlashMessage::setUserAlreadyLoggedInMessage();
                    $serviceResponse = ( new PostService() )->indexOnGet();
                } else {
                    $serviceResponse = ( new UserService() )->loginOnPost();
                }
                $this->loadView($serviceResponse->getViewPath(), $serviceResponse->getData());
                break;
            default:
                $this->methodNotAllowed();
        }
    }

    /**
     * onGet  = Loads the register form
     * onPost = on register form submit send the data to the service an loads the right view
     */
    public function register()
    {
        switch ($_SERVER['REQUEST_METHOD'])
        {
            case 'GET': # Load the form
                if (SessionManager::isUserLoggedIn()) {
                    FlashMessage::setUserAlreadyLoggedInMessage();
                    $serviceResponse = ( new PostService() )->indexOnGet();
                } else {
                    $serviceResponse = ( new UserService() )->registerOnGet();
                }
                $this->loadView($serviceResponse->getViewPath(), $serviceResponse->getData());
                break;
            case 'POST': # Submit the form
                if (SessionManager::isUserLoggedIn()) {
                    FlashMessage::setUserAlreadyLoggedInMessage();
                    $serviceResponse = ( new PostService() )->indexOnGet();
                } else {
                    $serviceResponse = ( new UserService() )->registerOnPost();
                }
                $this->loadView($serviceResponse->getViewPath(), $serviceResponse->getData());
                break;
            default:
                $this->methodNotAllowed();
        }
    }

    public function profile(int $id = 0)
    {
        // TODO: change this to standart
        die(" - TODO: implement this method.");
    }

    public function logout()
    {
        switch ($_SERVER['REQUEST_METHOD'])
        {
            case 'GET': 
                if (SessionManager::isUserLoggedIn()) {
                    $serviceResponse = ( new UserService() )->logoutOnGet();
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
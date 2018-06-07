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

        // if (!isset($_SESSION['user'])) {
        //     $this->login();
        //     return;
        // } 

        // $this->loadView("page/index", []); #TEMP
        // $this->profile($_SESSION['user']->id);

        // switch ($_SERVER['REQUEST_METHOD'])
        // {
        //     case 'GET':
        //         break;
        //     default:
        //         $this->methodNotAllowed();
        // }
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
                $serviceResponse = ( new UserService() )->loginOnGet();
                $this->loadView($serviceResponse->getViewPath(), $serviceResponse->getData());
                break;
            case 'POST': # Submit the form
                if (SessionManager::isUserLoggedIn()) {
                    $serviceResponse = ( new PostService )->indexOnGet();
                } else {
                    $serviceResponse = ( new UserService )->loginOnPost();
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
                    $serviceResponse = ( new PostService )->indexOnGet();
                } else {
                    $serviceResponse = ( new UserService() )->registerOnGet();
                }
                $this->loadView($serviceResponse->getViewPath(), $serviceResponse->getData());
                break;
            case 'POST': # Submit the form
                if (SessionManager::isUserLoggedIn()) {
                    $serviceResponse = ( new PostService )->indexOnGet();
                } else {
                    $serviceResponse = ( new UserService )->registerOnPost();
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

        // if ($id === 0) {
        //     // TODO: Show Flash Error Message
        //     $this->index();
        //     return;
        // }

        // $data = [];

        // $this->loadView("user/profile", $data);

        // switch ($_SERVER['REQUEST_METHOD'])
        // {
        //     case 'GET':
        //         break;
        //     default:
        //         $this->methodNotAllowed();
        // }
    }

    /**
     * Test Method. Should be excluded before prod version
     */
    public function test()
    {
        // switch( $_SERVER['REQUEST_METHOD'] )
        // {
        //     case 'GET' : 
        //         echo "GET was call in test"; 
        //         break;
        //     case 'POST' : 
        //         echo "POST was call in test"; 
        //         break;
        //     default: 
        //         echo "Default was called in test";
        // }
        // $this->methodNotAllowed();
    }

    public function logout()
    {
        switch ($_SERVER['REQUEST_METHOD'])
        {
            case 'GET': 
                if (SessionManager::isUserLoggedIn()) {
                    $serviceResponse = ( new UserService() )->logoutOnGet();
                } else {
                    $serviceResponse = ( new PageService() )->indexOnGet();
                }
                $this->loadView($serviceResponse->getViewPath(), $serviceResponse->getData());
                break;
            default:
                $this->methodNotAllowed();
        }
    }
}
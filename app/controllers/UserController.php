<?php
require_once APP_ROOT . "/services/UserService.php";
require_once APP_ROOT . "/services/ServiceResponse.php";

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
        if (!isset($_SESSION['user'])) {
            $this->login();
            return;
        } 

        $this->loadView("page/index", []); #TEMP
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
                $serviceResponse = ( new UserService )->loginOnPost();
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
                $serviceResponse = ( new UserService() )->registerOnGet();
                $this->loadView($serviceResponse->getViewPath(), $serviceResponse->getData());
                break;
            case 'POST': # Submit the form
                $serviceResponse = ( new UserService )->registerOnPost();
                $this->loadView($serviceResponse->getViewPath(), $serviceResponse->getData());
                break;
            default:
                $this->methodNotAllowed();
        }
    }

    public function profile(int $id = 0)
    {
        if ($id === 0) {
            // TODO: Show Flash Error Message
            $this->index();
            return;
        }

        $data = [];

        $this->loadView("user/profile", $data);

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
                $serviceResponse = ( new UserService() )->logoutOnGet();
                $this->loadView($serviceResponse->getViewPath(), $serviceResponse->getData());
                break;
            default:
                $this->methodNotAllowed();
        }
    }
}
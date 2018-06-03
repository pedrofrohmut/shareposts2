<?php
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

        $this->profile($_SESSION['user']->id);
    }

    /**
     * onGet  = Loads the login form
     * onPost = on login form submit send the data to the service an loads the right view
     */
    public function login()
    {
        // $data = [];

        // $this->loadView("user/login", $data);
        switch ($_SERVER['REQUEST_METHOD'])
        {
            case 'GET': # Load the form
                
                $data = [
                    "email"             => "",
                    "password"          => "",
                    "emailErr"          => "",
                    "passwordErr"       => ""
                ];

                $this->loadView("user/login", $data);

                break;

            case 'POST': # Submit the form
                
                // $service = new UserService();
                // $serviceResponse = $service->registerOnPost();
                // $this->loadView($serviceResponse->viewPath, $serviceResponse->data);

                $this->loadView("user/login", []);

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
                
                $data = [
                    "name"              => "",
                    "email"             => "",
                    "password"          => "",
                    "confirmPassword"   => "",
                    "nameErr"           => "",
                    "emailErr"          => "",
                    "passwordErr"       => "",
                    "confirmPasswodErr" => ""
                ];

                $this->loadView("user/register", $data);

                break;

            case 'POST': # Submit the form
                
                // $service = new UserService();
                // $serviceResponse = $service->registerOnPost();
                // $this->loadView($serviceResponse->viewPath, $serviceResponse->data);

                $this->loadView("user/register", []);

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
        $this->methodNotAllowed();
    }
}
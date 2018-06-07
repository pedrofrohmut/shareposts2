<?php
require_once APP_ROOT . "/services/PostService.php";

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
                $serviceResponse = ( new PostService() )->indexOnGet();
                $this->loadView($serviceResponse->getViewPath(), $serviceResponse->getData());
                break;
            default:
                $this->methodNotAllowed();
        }
    }

    public function add()
    {
        die(" - TODO: implement this method");
        // $data = [];

        // $this->loadView("post/add", $data);

        // switch ($_SERVER['REQUEST_METHOD'])
        // {
        //     case 'GET':
        //         break;
        //     default:
        //         $this->methodNotAllowed();
        // }
    }
}
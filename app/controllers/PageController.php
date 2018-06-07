<?php
require_once APP_ROOT . "/services/PostService.php";
require_once APP_ROOT . "/services/PageService.php";

class PageController extends Controller
{
    public function __construct() { }

    public function index()
    {
        switch ($_SERVER['REQUEST_METHOD'])
        {
            case 'GET':
                // redirects when user is logged in
                if (isset($_SESSION['user'])) {
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
<?php
require_once APP_ROOT . "/services/ServiceResponse.php";

class PostService
{
    public function __construct()
    {

    }

    public function indexOnGet()
    {
        $viewPath = "post/index";
        $data = [];
        return new ServiceResponse($viewPath, $data);
    }
}
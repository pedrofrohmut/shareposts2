<?php
class PageService
{
    public function __construct()
    {

    }

    public function indexOnGet()
    {
        $viewPath = "page/index";
        $data = [];
        return new ServiceResponse($viewPath, $data);
    }

    public function aboutOnGet()
    {
        $viewPath = "page/about";
        $data = [];
        return new ServiceResponse($viewPath, $data);
    }
}
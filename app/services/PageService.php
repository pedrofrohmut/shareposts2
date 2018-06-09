<?php
class PageService extends Service 
{
    public function __construct(array $params = [])
    {
        parent::__construct($params);
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
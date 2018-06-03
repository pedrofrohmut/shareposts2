<?php 
class ServiceResponse
{
    private $viewPath;
    private $data;

    public function __construct(string $viewPath, array $data)
    {
        $this->viewPath = $viewPath;
        $this->data = $data;
    }

    public function getViewPath():string
    {
        return $this->viewPath;
    }

    public function getData():array
    {
        return $this->data;
    }
}
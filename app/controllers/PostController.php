<?php
class PostController extends Controller 
{
    public function __construct()
    {
        
    }

    public function index() 
    {
        $data = [];

        $this->loadView("post/index", $data);
    }

    public function add()
    {
        $data = [];

        $this->loadView("post/add", $data);
    }
}
<?php
class PostsController extends Controller 
{
    public function __construct()
    {
        
    }

    public function index() 
    {
        $data = [];

        $this->loadView("posts/index", $data);
    }

    public function add()
    {
        $data = [];

        $this->loadView("posts/add", $data);
    }
}
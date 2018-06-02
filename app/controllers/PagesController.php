<?php
class PagesController extends Controller
{
    public function __construct() 
    {
        
    }

    public function index()
    {
        $data = [
            "title" => "SharePosts",
            "description" => "Welcome to SharePosts where you can share your posts to everyone and see every one posts."
        ];

        $this->loadView("pages/index", $data);
    }

    public function about()
    {
        $data = [
            "title" => "This is about page",
            "description" => "SharePosts is a web site where you can Submit posts that will be seeing by all the users of this sites.",
            "version" => "2.0.0",
            "coder" => "Pedro Frohmut"
        ];

        $this->loadView("/pages/about", $data);
    }
}
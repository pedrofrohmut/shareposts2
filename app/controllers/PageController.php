<?php
class PageController extends Controller
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

        $this->loadView("page/index", $data);
    }

    public function about()
    {
        $data = [
            "title" => "About the SharePost App",
            "description" => "SharePosts is a web site where you can Submit posts that will be seeing and shared by all the users of this sites. A place qhere you can share your thoughts, expiriences and feelings with each other.",
            "version" => SITE_VERSION,
            "coder" => SITE_AUTHOR
        ];

        $this->loadView("/page/about", $data);
    }
}
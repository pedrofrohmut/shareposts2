<?php
class PostsController extends Controller 
{
    public function __construct()
    {
        // echo "<br><br>Posts Controller construct.";
    }

    public function index() 
    {
        // echo "<br><br>Index Action Called (PostsController).";

        $data = [];

        $this->loadView("posts/index", $data);
    }

    public function add()
    {
        // echo "<br><br>Add Action Called (PostController).";

        $data = [];

        $this->loadView("posts/add", $data);
    }
}
<?php
require_once APP_ROOT . "/services/ServiceResponse.php";
require_once APP_ROOT . "/helpers/ConnectionFactory.php";
require_once APP_ROOT . "/daos/PostDao.php";

class PostService
{
    public function __construct()
    {

    }

    public function indexOnGet()
    {
        $posts = ( new PostDao( ConnectionFactory::getConnection() ) )->getPosts();
        
        $data = [
            "posts" => $posts
        ];

        $viewPath = "post/index";

        return new ServiceResponse($viewPath, $data);
    }
} 
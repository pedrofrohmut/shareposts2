<?php
require_once APP_ROOT . "/services/Service.php";
require_once APP_ROOT . "/services/ServiceResponse.php";
require_once APP_ROOT . "/helpers/ConnectionFactory.php";
require_once APP_ROOT . "/daos/PostDao.php";

class PostService extends Service
{
    public function __construct(array $params = [])
    {
        parent::__construct($params);
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

    public function addOnGet()
    {
        $data = [
            "title" => "",
            "body" => "",
            "titleErr" => "",
            "bodyErr" => ""
        ];

        $viewPath = "post/add";

        return new ServiceResponse($viewPath, $data);
    }

    public function addOnPost()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            "title"     => trim($_POST["title"]),
            "body"      => trim($_POST["body"]),
            "userId"    => SessionManager::getUserId(),
            "titleErr"  => "",
            "bodyErr"   => ""
        ];

        // Validate the title
        if (empty($data["title"])) {
            $data["titleErr"] = "Please enter a title";
        }

        // Validate the body
        if (empty($data["body"])) {
            $data["bodyErr"] = "Please enter the body text";
        }

        // Make sure there are no errors
        if ( !empty($data["titleErr"]) || !empty($data["bodyErr"]) ) {
            $viewPath = "post/add";
            // load view with errors
            return new ServiceResponse($viewPath, $data);
        }

        $post = new Post();
        $post->setTitle($data["title"]);
        $post->setBody($data["body"]);
        $user = new User();
        $user->setId($data["userId"]);
        $post->setUser($user);

        $postAdded = ( new PostDao( ConnectionFactory::getConnection() ) )->create($post);

        if ($postAdded) {
            FlashMessage::setMessage("Post added successfuly", "success");
        } else {
            FlashMessage::setMessage("There was an error when adding post", "danger");
        }

        return $this->indexOnGet();
    }

    public function showOnGet()
    {
        $post = ( new PostDao( ConnectionFactory::getConnection() ) )->findPostById($this->params["postId"]);

        $data = [
            "post" => $post
        ];

        $viewPath = "post/show";

        return new ServiceResponse($viewPath, $data);
    }
} 
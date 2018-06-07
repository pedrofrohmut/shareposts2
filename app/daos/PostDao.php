<?php
require_once APP_ROOT . "/models/Post.php";
require_once APP_ROOT . "/models/User.php";

/**
 * Preference for CRUD names when applicable
 */
class PostDao 
{
    private $conn;

    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    public function getPosts()
    {
        $stm = $this->conn->prepare(
        "   SELECT 
                p.id, p.user_id, u.name AS user_name, p.title, p.body, p.created_at 
            FROM 
                posts AS p, users AS u
            WHERE 
                p.user_id = u.id
            ORDER BY 
                created_at DESC");
        $stm->execute();
        $resultSet = $stm->fetchAll();

        $posts = [];

        foreach ($resultSet as $post) {
            $u = new User();
            $u->setId($post->user_id);
            $u->setName($post->user_name);

            $p = new Post();
            $p->setId($post->id);
            $p->setUser($u);
            $p->setTitle($post->title);
            $p->setBody($post->body);
            $p->setCreatedAt($post->created_at);

            $posts[] = $p;
        }

        return $posts;
    }
}
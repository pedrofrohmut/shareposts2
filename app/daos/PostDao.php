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

    public function getPosts():array
    {
        $stm = $this->conn->prepare(
        "   SELECT 
                p.id, p.user_id, u.name AS user_name, p.title, p.body, p.created_at 
            FROM 
                posts AS p, users AS u
            WHERE 
                p.user_id = u.id
            ORDER BY 
                created_at DESC"
        );

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

    public function create(Post $post):bool
    {
        $stm = $this->conn->prepare(
        "   INSERT INTO posts (
                 user_id,  title,  body
            ) VALUES (
                :user_id, :title, :body
            )"
        );

        $stm->bindValue(":user_id", $post->getUser()->getId(), PDO::PARAM_INT);
        $stm->bindValue(":title",   $post->getTitle(),         PDO::PARAM_STR);
        $stm->bindValue(":body",    $post->getBody(),          PDO::PARAM_STR);

        if ($stm->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function findPostById(int $id)
    {
        $stm = $this->conn->prepare(
        "   SELECT 
                p.id, p.user_id, u.name AS user_name, p.title, p.body, p.created_at
            FROM 
                posts AS p, users AS u 
            WHERE 
                p.user_id = u.id AND p.id = :id"
        );

        $stm->bindValue(":id", $id, PDO::PARAM_INT);
        $stm->execute();
        $fetchedPost = $stm->fetch();

        if ($fetchedPost) {
            $user = new User();
            $user->setId($fetchedPost->user_id);
            $user->setName($fetchedPost->user_name);

            $post = new Post();
            $post->setId($fetchedPost->id);
            $post->setUser($user);
            $post->setTitle($fetchedPost->title);
            $post->setBody($fetchedPost->body);
            $post->setCreatedAt($fetchedPost->created_at);

            return $post;
        } else {
            return false;
        }
    }

    public function update(Post $post):bool
    {
        $stm = $this->conn->prepare(
        "   UPDATE 
                posts 
            SET
                title = :title, body = :body 
            WHERE
                id = :id"
        );

        $stm->bindValue(":title", $post->getTitle(), PDO::PARAM_STR);
        $stm->bindValue(":body",  $post->getBody(),  PDO::PARAM_STR);
        $stm->bindValue(":id",    $post->getId(),    PDO::PARAM_INT);

        if ($stm->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete(int $id):bool 
    {
        $stm = $this->conn->prepare("DELETE FROM posts WHERE id = :id");
        $stm->bindValue(":id", $id, PDO::PARAM_INT);

        if ($stm->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
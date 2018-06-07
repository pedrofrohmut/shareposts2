<?php
require_once APP_ROOT . "/models/User.php";

class Post
{
    private $id;
    private $user;
    private $title;
    private $body;
    private $createdAt;

    public function __construct()
    {
        $this->init();
    }

    private function init()
    {
        $this->id        = 0;
        $this->user      = new User();
        $this->title     = "";
        $this->body      = "";
        $this->createdAt = "";
    }

    public function getId():int
    {
        return $this->id ?? 0;
    }

    public function getUser():User 
    {
        return $this->user ?? new User();
    }

    public function getTitle():string
    {
        return $this->title ?? "";
    }

    public function getBody():string
    {
        return $this->body ?? "";
    }

    public function getCreatedAt():string
    {
        return $this->createdAt ?? "";
    }

    public function setId(int $id) 
    {
        $this->id = $id;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function setBody(string $body)
    {
        $this->body = $body;
    }

    public function setCreatedAt(string $createdAt)
    {
        $this->createdAt = $createdAt;
    }
}
<?php
class User
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $createdAt;

    public function __construct()
    {
        echo "<br><br>User constructed.";
    }

    public function getId():int
    {
        return $this->id ?? 0;
    }

    public function getName():string
    {
        return $this->name ?? "";
    }

    public function getEmail():string
    {
        return $this->email ?? "";
    }

    public function getPassword():string
    {
        return $this->password ?? "";
    }

    public function getCreatedAt():string 
    {
        // TODO: format it before return
        return $this->createdAt ?? "";
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function setCreatedAt(string $createdAt)
    {
        $this->createdAt = $createdAt;
    }
}
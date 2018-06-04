<?php
require_once APP_ROOT . "/models/user/User.php";

class UserDao
{
    private $conn;

    public function __construct($connection)
    {
        // echo "<br><br>User Dao construct."; #DEBUG

        $this->conn = $connection;
    }

    public function findUserByEmail(string $email)
    {
        $stm = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
        $stm->bindValue(":email", $email, PDO::PARAM_STR);        
        $stm->execute();
        $user = $stm->fetch();

        if ($user) {
            return $user;
        } else {
            return false;
        }
    }

    public function findUserByName(string $name)
    {
        $stm = $this->conn->prepare("SELECT * FROM users WHERE name = :name");
        $stm->bindValue(":name", $name, PDO::PARAM_STR);
        $stm->execute();
        $user = $stm->fetch();

        if ($user) {
            return $user;
        } else {
            return false;
        }
    }

    public function create(User $user)
    {
        $stm = $this->conn->prepare(
            "INSERT INTO users (
                name, email, password
            ) VALUES (
                :name, :email, :password)"
        );

        $stm->bindValue(":name",     $user->getName(),     PDO::PARAM_STR);
        $stm->bindValue(":email",    $user->getEmail(),    PDO::PARAM_STR);
        $stm->bindValue(":password", $user->getPassword(), PDO::PARAM_STR);

        if ($stm->execute()) {
            return true;
        } else {
            return false;
        }        
    }
}
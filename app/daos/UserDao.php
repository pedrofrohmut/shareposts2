<?php
require_once APP_ROOT . "/models/User.php";

/**
 * Preference for CRUD names when applicable
 */
class UserDao
{
    private $conn;

    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    public function findUserByEmail(string $email)
    {
        $stm = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
        $stm->bindValue(":email", $email, PDO::PARAM_STR);        
        $stm->execute();
        $userFetch = $stm->fetch();

        if ($userFetch) {
            $user = new User();
            $user->setId($userFetch->id);
            $user->setName($userFetch->name);
            $user->setEmail($userFetch->email);
            $user->setPassword($userFetch->password);
            $user->setCreatedAt($userFetch->created_at);
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
        $userFetch = $stm->fetch();

        if ($userFetch) {
            $user = new User();
            $user->setId($userFetch->id);
            $user->setName($userFetch->name);
            $user->setEmail($userFetch->email);
            $user->setPassword($userFetch->password);
            $user->setCreatedAt($userFetch->created_at);
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
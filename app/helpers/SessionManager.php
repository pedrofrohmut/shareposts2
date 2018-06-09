<?php
/**
 * 
 * This class will concentrate the methods that deals with the global session ($_SESSION)
 * 
 * Every time you deal with session you should use a method of this class and not deal with it directly
 * 
 */
class SessionManager
{

    public function __construct()
    {
        $this->init();
    }

    private function init() { }

    public static function start()
    {
        require_once APP_ROOT . "/helpers/FlashMessage.php";
        require_once APP_ROOT . "/models/User.php";
        session_start();
    }

    public static function setUser(User $user)
    {
        $_SESSION['user'] = $user;
    }

    public static function logoutUser()
    {
        unset($_SESSION['user']);
        session_destroy();
    }

    public static function isUserLoggedIn():bool
    {
        if (isset($_SESSION['user'])) {
            return true;
        } else {
            return false;
        }
    }

    public static function getUserId():int 
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user']->getId();
        } else {
            return 0;
        }
    }

    public static function getFlashMessages()
    {
        return $_SESSION['flashMessages'] ?? [];
    }

    public static function setFlashMessage(string $message, string $class)
    {
        $_SESSION['flashMessages'][$message] = $class;
    }

    public static function cleanFlashMessages()
    {
        unset($_SESSION['flashMessages']);
    }

    public static function isCurrentUserThePostOwner($post):bool
    {
        return $post->getUser()->getId() === SessionManager::getUserId();
    }
}
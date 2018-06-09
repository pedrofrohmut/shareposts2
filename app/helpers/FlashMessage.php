<?php
/**
 * Get and Set Flash Messages: Messages that are set in the session and are deleted once they are called
 * Displaying Procedures will be made by the viewComponent = views/helpers/flash-message.php
 */
class FlashMessage
{
    public static function setMessage($msg, $class = "info")
    {
        if (empty($msg)) return;

        $class = "alert-". $class ." flash-message";

        SessionManager::setFlashMessage($msg, $class);
    }

    public static function displayAll()
    {
        require_once APP_ROOT . "/views/helpers/flash-messages.php";
    }

    public static function setUserNotLoggedInMessage()
    {
        FlashMessage::setMessage("You must log in to access this function.", "warning");
    }

    public static function setUserAlreadyLoggedInMessage()
    {
        FlashMessage::setMessage("You are already logged in and were redirect.", "info");
    }
}
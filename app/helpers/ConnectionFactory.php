<?php
class ConnectionFactory
{
    public static function getConnection()
    {
        // TODO: make a way with file exists to get connection from getenv() with heroku but use config/Database at local dev

        try {
            $dataSourceName = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET;

            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_EMULATE_PREPARES   => false
            ];

            return new PDO($dataSourceName, DB_USER, DB_PASS, $options);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage(); // TODO: make it a flashMessage
            return false;
        }
    }
}
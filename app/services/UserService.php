<?php 
require_once APP_ROOT . "/services/ServiceResponse.php";
require_once APP_ROOT . "/helpers/ConnectionFactory.php";
require_once APP_ROOT . "/models/user/UserDao.php";
require_once APP_ROOT . "/models/user/User.php";

class UserService
{
    public function __construct()
    {

    }

    public function registerOnGet()
    {
        $data = [
            "name"              => "",
            "email"             => "",
            "password"          => "",
            "confirmPassword"   => "",
            "nameErr"           => "",
            "emailErr"          => "",
            "passwordErr"       => "",
            "confirmPasswodErr" => ""
        ];

        $viewPath = "user/register";

        return new ServiceResponse($viewPath, $data);
    }

    public function registerOnPost()
    {
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            "name"              => trim($_POST['name']),
            "email"             => trim($_POST['email']),
            "password"          => trim($_POST['password']),
            "confirmPassword"   => trim($_POST['confirmPassword']),
            "nameErr"           => "",
            "emailErr"          => "",
            "passwordErr"       => "",
            "confirmPasswodErr" => ""
        ];

        if (empty($data['name'])) {
            $data['nameErr'] = "Please enter your name.";
            $data['password'] = "";
            $data['confirmPassword'] = "";
        }

        if (empty($data['email'])) {
            $data['emailErr'] = "Please enter your email.";
            $data['password'] = "";
            $data['confirmPassword'] = "";
        }

        if (empty($data['password'])) {
            $data['passwordErr'] = "Please enter your password.";
            $data['password'] = "";
            $data['confirmPassword'] = "";
        }

        if (empty($data['confirmPassword'])) {
            $data['confirmPasswordErr'] = "Please confirm your password.";
        } elseif($data['confirmPassword'] !== $data['password']) {
            $data['passwordErr'] = "Your password and confirm password doesn't match. Please try again.";
            $data['password'] = "";
            $data['confirmPassword'] = "";
        }

        // If there are any errors
        if (
            !empty($data['nameErr'])     && !empty($data['emailErr']) &&
            !empty($data['passwordErr']) && !empty($data['confirmPasswordErr'])
        ) {
            $viewPath = "user/register";

            return new ServiceResponse($viewPath, $data);
        }
        
        

        $viewPath = "user/register";

        return new ServiceResponse($viewPath, $data);
    }
    
    public function loginOnGet()
    {
        $data = [
            "email"             => "",
            "password"          => "",
            "emailErr"          => "",
            "passwordErr"       => ""
        ];

        $viewPath = "user/login";

        return new ServiceResponse($viewPath, $data);
    }

    public function loginOnPost()
    {
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            "email"             => trim($_POST['email']),
            "password"          => trim($_POST['password']),
            "emailErr"          => "",
            "passwordErr"       => ""
        ];

        if (empty($data['email'])) {
            $data['emailErr'] = "Please enter your email.";
            $data['password'] = "";
            $data['confirmPassword'] = "";
        }

        if (empty($data['password'])) {
            $data['passwordErr'] = "Please enter your password.";
            $data['password'] = "";
            $data['confirmPassword'] = "";
        }

        // If there are any errors
        if (
            !empty($data['emailErr']) && !empty($data['passwordErr'])
        ) {
            $viewPath = "user/login";
            return new ServiceResponse($viewPath, $data);
        }
        

        $viewPath = "user/login";

        return new ServiceResponse($viewPath, $data);
    }
}
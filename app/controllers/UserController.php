<?php
class UserController extends Controller 
{
    public function __construct()
    {

    }

    public function index()
    {
        $data = [];

        $this->loadView("user/index", $data);
    }

    public function login()
    {
        $data = [];

        $this->loadView("user/login", $data);
    }
}
<?php
class UsersController extends Controller 
{
    public function __construct()
    {

    }

    public function index()
    {
        $data = [];

        $this->loadView("users/index", $data);
    }

    public function login()
    {
        $data = [];

        $this->loadView("users/login", $data);
    }
}
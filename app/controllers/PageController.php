<?php
class PageController extends Controller
{
    public function __construct() { }

    public function index()
    {
        $this->loadView("page/index", []);
    }

    public function about()
    {
        $this->loadView("page/about", []);
    }
}
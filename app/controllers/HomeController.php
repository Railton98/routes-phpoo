<?php

namespace app\controllers;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home';

        $this->view('home', compact('title'));
    }
}

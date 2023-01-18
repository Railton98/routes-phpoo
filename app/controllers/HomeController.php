<?php

namespace app\controllers;

use app\database\models\User;

class HomeController extends Controller
{
    public function index()
    {
        $user = new User;
        $user->fetch();

        $title = 'Home';

        $this->view('home', compact('title'));
    }
}

<?php

namespace app\controllers;

use app\database\Filters;
use app\database\models\User;

class HomeController extends Controller
{
    public function index()
    {
        $user = new User;
        $userFound = $user->first();
        dd($userFound);

        $title = 'Home';

        $this->view('home', compact('title'));
    }
}

<?php

namespace app\controllers;

use app\database\Filters;
use app\database\models\User;

class HomeController extends Controller
{
    public function index()
    {
        $user = new User;
        $created = $user->create([
            'firstName' => 'Tecks',
            'lastName' => 'Dev',
            'email' => 'tecks@dev.com',
            'password' => '123',
        ]);
        dd($created);

        $title = 'Home';

        $this->view('home', compact('title'));
    }
}

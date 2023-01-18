<?php

namespace app\controllers;

use app\database\Filters;
use app\database\models\User;

class HomeController extends Controller
{
    public function index()
    {
        $filters = new Filters;
        $filters->where('users.id', '>', 170);
        $filters->join('posts', 'users.id', '=', 'posts.userId', 'LEFT JOIN');

        $user = new User;
        $user->setFields('users.id,firstName,lastName,title');
        $user->setFilters($filters);
        $userFound = $user->fetchAll();
        dd($userFound);

        $title = 'Home';

        $this->view('home', compact('title'));
    }
}

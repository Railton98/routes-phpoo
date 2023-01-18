<?php

namespace app\controllers;

use app\database\Filters;
use app\database\models\User;

class HomeController extends Controller
{
    public function index()
    {
        $filters = new Filters;
        $filters->where('id', '>', 50, 'AND');
        $filters->orderBy('id', 'DESC');
        $filters->limit(5);

        $user = new User;
        $user->setFilters($filters);
        $user->fetchAll();

        $title = 'Home';

        $this->view('home', compact('title'));
    }
}

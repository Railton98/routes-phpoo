<?php

namespace app\controllers;

use app\database\Filters;
use app\database\Pagination;
use app\database\models\User;

class HomeController extends Controller
{
    public function index()
    {
        $filters = new Filters;
        $filters->where('users.id', '>', 0);

        $pagination = new Pagination;
        $pagination->setItemsPerPage(10);

        $user = new User;
        $user->setFields('users.id,firstName,lastName');
        $user->setFilters($filters);
        $user->setPagination($pagination);
        $usersFound = $user->fetchAll();

        $this->view('home', ['title' => 'Home', 'users' => $usersFound, 'pagination' => $pagination]);
    }
}

<?php

namespace app\controllers;

use app\core\Request;

class UserController extends Controller
{
    public function edit()
    {
        $this->view('user', ['title' => 'Editar User']);
    }

    public function update($params)
    {
        $fields = Request::excepts('password');
        dd($fields);
    }
}

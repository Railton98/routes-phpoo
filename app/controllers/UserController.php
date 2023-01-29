<?php

namespace app\controllers;

use app\core\Request;
use app\support\Csrf;

class UserController extends Controller
{
    public function edit()
    {
        $this->view('user', ['title' => 'Editar User']);
    }

    public function update($params)
    {
        Csrf::validateToken();
        // $fields = Request::only('password');
        // dd($fields);
    }
}

<?php

namespace app\controllers;

use League\Plates\Engine;

class UserController extends Controller
{
    public function edit()
    {
        $this->view('user', ['title' => 'Editar User']);
    }

    public function update($params)
    {
        dd('update', $params);
    }
}

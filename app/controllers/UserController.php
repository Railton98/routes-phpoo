<?php

namespace app\controllers;

use app\support\Validate;

class UserController extends Controller
{
    public function edit()
    {
        $this->view('user', ['title' => 'Editar User']);
    }

    public function update($params)
    {
        $validate = new Validate;
        $validate->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'password' => 'required|maxLen:10',
        ]);
    }
}

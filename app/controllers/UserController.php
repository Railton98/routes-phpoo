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
        $validated = $validate->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'email|required',
            'password' => 'maxLen:10|required',
        ]);

        if (!$validated) {
            return redirect('/user/12');
        }

        dd($validated);
    }
}

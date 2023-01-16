<?php

namespace app\controllers;

use League\Plates\Engine;

class UserController extends Controller
{
    public function edit($params)
    {
        $templates = new Engine('../app/views');

        $this->view('user', [
            'title' => 'Página do User',
            'name' => 'Railton',
        ]);
    }
}

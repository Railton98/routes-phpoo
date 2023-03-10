<?php

namespace app\support;

use app\core\Request;
use Exception;

class Csrf
{
    public static function getToken(): string
    {
        if (isset($_SESSION['token'])) {
            unset($_SESSION['token']);
        }

        $_SESSION['token'] = md5(uniqid());

        return "<input type='hidden' name='token' value='{$_SESSION['token']}'/>";
    }

    public static function validateToken()
    {
        if (!isset($_SESSION['token'])) {
            throw new Exception('Token Inválido');
        }

        ['token' => $token] = Request::only('token');

        if ($_SESSION['token'] !== $token) {
            throw new Exception('Token Inválido');
        }

        unset($_SESSION['token']);

        return true;
    }
}

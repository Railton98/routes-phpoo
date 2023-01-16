<?php

namespace app\core;

use Exception;

class Request
{
    public static function input(string $name)
    {
        if (!isset($_POST[$name])) {
            throw new Exception("O Índice $name não existe");
        }

        return $_POST[$name];
    }

    public static function all()
    {
        return $_POST;
    }

    public static function only(string|array $only)
    {
        $fieldsPost = self::all();
        $fieldsPostKeys = array_keys($fieldsPost);

        foreach ($fieldsPostKeys as $index => $value) {
            if ($value !== (is_string($only) ? $only : (isset($only[$index]) ? $only[$index] : null))) {
                unset($fieldsPost[$value]);
            }
        }

        return $fieldsPost;
    }
}

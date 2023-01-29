<?php

namespace app\traits;

trait Validations
{
    public function email()
    {
        dd('email');
    }

    public function required()
    {
        echo 'required';
    }
    
    public function maxLen($param)
    {
        echo 'maxlen';
    }
}

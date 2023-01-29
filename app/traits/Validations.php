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
        dd('required');
    }
    
    public function maxLen($param)
    {
        dd($param);
    }
}

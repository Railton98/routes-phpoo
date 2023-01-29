<?php

namespace app\support;

use Exception;
use app\traits\Validations;

class Validate
{
    use Validations;

    public function validate(array $validationsFields)
    {
        foreach ($validationsFields as $field => $validation) {
            $havePipes = str_contains($validation, '|');

            if (!$havePipes) {
                $param = '';

                if (str_contains($validation, ':')) {
                    [$validation, $param] = explode(':', $validation);
                }

                if (!method_exists($this, $validation)) {
                    throw new Exception("O método $validation não existe na validação");
                }

                $this->$validation($param);
            }
        }
    }
}

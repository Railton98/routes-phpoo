<?php

namespace app\support;

use Exception;
use app\traits\Validations;

class Validate
{
    use Validations;

    public function validate(array $validationsFields)
    {
        $inputsValidation = [];
        foreach ($validationsFields as $field => $validation) {
            $havePipes = str_contains($validation, '|');

            $param = '';
            if (!$havePipes) {
                if (str_contains($validation, ':')) {
                    [$validation, $param] = explode(':', $validation);
                }

                if (!method_exists($this, $validation)) {
                    throw new Exception("O método $validation não existe na validação");
                }

                $inputsValidation[$field] = $this->$validation($field, $param);
            } else {
                $validations = explode('|', $validation);
                foreach ($validations as $validation) {
                    if (str_contains($validation, ':')) {
                        [$validation, $param] = explode(':', $validation);
                    }

                    if (!method_exists($this, $validation)) {
                        throw new Exception("O método $validation não existe na validação");
                    }

                    $inputsValidation[$field] = $this->$validation($field, $param);

                    if (empty($inputsValidation[$field])) {
                        break;
                    }
                }
            }
        }

        Csrf::validateToken();

        if (in_array(null, $inputsValidation, true)) {
            return null;
        }

        return $inputsValidation[$field];
    }
}

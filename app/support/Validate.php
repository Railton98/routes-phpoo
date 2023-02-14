<?php

namespace app\support;

use Exception;
use app\traits\Validations;

class Validate
{
    use Validations;

    private $inputsValidation = [];

    private function getParam($validation, $param)
    {
        if (str_contains($validation, ':')) {
            [$validation, $param] = explode(':', $validation);
        }

        return [$validation, $param];
    }

    private function validationExist($validation)
    {
        if (!method_exists($this, $validation)) {
            throw new Exception("O método $validation não existe na validação");
        }
    }

    public function validate(array $validationsFields)
    {
        foreach ($validationsFields as $field => $validation) {
            $havePipes = str_contains($validation, '|');

            $param = '';
            if (!$havePipes) {
                [$validation, $param] = $this->getParam($validation, $param);

                $this->validationExist($validation);

                $this->inputsValidation[$field] = $this->$validation($field, $param);
            } else {
                $validations = explode('|', $validation);

                $this->multipleValidations($validations, $field, $param);
            }
        }

        return $this->returnValidation();
    }

    private function multipleValidations($validations, $field, $param)
    {
        foreach ($validations as $validation) {
            [$validation, $param] = $this->getParam($validation, $param);

            $this->validationExist($validation);

            $this->inputsValidation[$field] = $this->$validation($field, $param);

            if ($this->inputsValidation[$field] === null) {
                break;
            }
        }
    }

    private function returnValidation()
    {
        Csrf::validateToken();

        if (in_array(null, $this->inputsValidation, true)) {
            return null;
        }

        return $this->inputsValidation;
    }
}

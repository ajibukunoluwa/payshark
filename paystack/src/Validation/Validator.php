<?php

namespace Ibk\Paystack\Validation;

use Ibk\Paystack\Exceptions\InvalidArgumentException;

class Validator
{

    public function validate(array $params, array $requiredFields)
    {
        $paramKeys          = array_keys($params);
        $requiredFieldKeys  = array_keys($requiredFields);

        foreach ($requiredFieldKeys as $fieldName) {
            $requiredFieldType = $requiredFields[$fieldName]['type'];

            if ( ! in_array($fieldName, $paramKeys)) {
                Throw new InvalidArgumentException(
                    "The `{$fieldName}` field is required"
                );
            }

            if ( ! isset($params[$fieldName])) {
                Throw new InvalidArgumentException(
                    "The `{$fieldName}` field can not be left empty"
                );
            }

            if (gettype($params[$fieldName]) !== $requiredFieldType) {
                Throw new InvalidArgumentException(
                    "The `{$fieldName}` field must be of type `{$requiredFieldType}`"
                );
            }
        }
    }
}

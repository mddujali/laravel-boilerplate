<?php

declare(strict_types=1);

namespace App\Support\Validators;

use Illuminate\Contracts\Validation\Validator;

class BooleanAnyValidator
{
    /**
     * This is invoked by the validator rule 'boolean_any'.
     *
     * @param $attribute string the attribute name that is validating
     * @param $value mixed the value that we're testing
     * @param $parameters array
     * @param Validator $validator Validator The Validator instance
     * @return bool
     */
    public function validate($attribute, $value, $parameters, Validator $validator): bool
    {
        return in_array($value, [
            '1', 1, 'true', true,
            '0', 0, 'false', false, ''
        ], true);
    }
}

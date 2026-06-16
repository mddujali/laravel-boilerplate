<?php

declare(strict_types=1);

namespace App\Support\Validators;

use Illuminate\Contracts\Validation\Validator;

class BooleanAlphaValidator
{
    /**
     * This is invoked by the validator rule 'boolean_alpha'.
     *
     * @param $attribute
     * @param $value
     * @param array $parameters
     * @param Validator $validator
     * @return bool
     */
    public function validate($attribute, $value, $parameters, Validator $validator): bool
    {
        return in_array($value, [
            'true', true,
            'false', false, ''
        ], true);
    }
}

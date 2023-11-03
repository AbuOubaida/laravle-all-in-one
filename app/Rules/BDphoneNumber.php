<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;

class BDphoneNumber implements ValidationRule, Rule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

    }

    public function passes($attribute, $value)
    {
        // TODO: Implement passes() method.
        // Define a regular expression pattern for Bangladeshi phone numbers.
        $pattern = "/^(?:\+?88|0088|0)?1[3456789]\d{8}$/";

        // Use preg_match to check if the value matches the pattern.
        return preg_match($pattern, $value);
    }

    public function message()
    {
        // TODO: Implement message() method.
        return 'The phone number is not in a valid Bangladeshi format.';
    }
}

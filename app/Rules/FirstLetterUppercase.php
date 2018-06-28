<?php
/**
 * User: Serhii T.
 * Date: 6/26/18
 */

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FirstLetterUppercase implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return mb_convert_case($value, MB_CASE_TITLE) === $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be first letter uppercase.';
    }
}

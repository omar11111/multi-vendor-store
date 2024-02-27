<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Filter implements Rule
{
    protected $forbiddenWords;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($forbidden)
    {
        $this->forbiddenWords = $forbidden;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return ! in_array(strtolower($value), $this->forbiddenWords);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Not Allowed Value';
    }
}

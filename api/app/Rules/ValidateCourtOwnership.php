<?php

namespace App\Rules;

use App\Court;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ValidateCourtOwnership implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $userId = Auth::id();

        $court = Court::where('id', $value)
            ->where('created_by_id', $userId)
            ->exists();

        return $court;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The selected court was not created by the current user.';
    }
}

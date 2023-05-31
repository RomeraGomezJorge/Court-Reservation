<?php

namespace App\Rules;

use App\Club;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ValidateClubOwnership implements Rule
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

        $club = Club::where('id', $value)
            ->where('created_by_id', $userId)
            ->exists();

        return $club;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The selected club was not created by the current user.';
    }
}

<?php

namespace App\Http\Requests\Backoffice\Court;

use App\Http\Requests\BaseFormRequest;
use App\Rules\ValidateClubOwnership;
use App\Rules\ValidateCourtOwnership;

class UpdateCourtRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type'           => ['required'],
            'number'         => ['required','numeric'],
            'players_number' => ['nullable','numeric'],
            'club_id'        => ['required', new ValidateClubOwnership()],
        ];
    }
}

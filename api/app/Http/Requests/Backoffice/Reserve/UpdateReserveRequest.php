<?php

namespace App\Http\Requests\Backoffice\Reserve;

use App\Http\Requests\BaseFormRequest;
use App\Rules\ValidateClubOwnership;

class UpdateReserveRequest extends BaseFormRequest
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
            'first_name' => ['required'],
            'last_name'  => ['required'],
            'email'      => ['required','email'],
            'phone'      => ['required'],
            'day'        => ['required','date_format:Y-m-d'],
            'hour'       => ['required','date_format:H:i'],
            'duration'   => ['required','date_format:H:i'],
            'court_id'   => ['required', new ValidateClubOwnership()],
        ];
    }
}

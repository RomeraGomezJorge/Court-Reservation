<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class RegisterRequest extends BaseFormRequest
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

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['error' => $validator->errors()], 422));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => ['required'],
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed|between:8,12|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]+$/',
            'club_name' => 'required|unique:clubs,name',
            'address'   => ['required'],
            'phone'     => 'required|unique:clubs,phone',
        ];
    }

    public function messages()
    {
        return [
            'password.regex' => 'The password must be between 8 and 12 characters and contain at least one uppercase letter, one lowercase letter, and one number.',
        ];
    }
}

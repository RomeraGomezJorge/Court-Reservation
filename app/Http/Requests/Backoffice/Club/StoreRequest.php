<?php

namespace App\Http\Requests\Backoffice\Club;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
                'name'      => 'required|unique:clubs,name',
                'address'   => 'required',
                'phone'     => 'nullable|unique:clubs,phone',
                'email'     => 'nullable|email|unique:clubs,email',
                "facebook"  => 'nullable|url|unique:clubs,facebook',
                "instagram" => 'nullable|url|unique:clubs,instagram',
                "twitter"   => 'nullable|url|unique:clubs,twitter',
        ];
    }
}

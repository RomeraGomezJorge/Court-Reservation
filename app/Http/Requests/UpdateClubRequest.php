<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateClubRequest extends FormRequest
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
        $id = $this->route('id');

        return [
            'name'      => ['sometimes', Rule::unique('clubs')->ignore($id)],
            'address'   => ['sometimes'],
            'email'     => ['nullable', 'email', Rule::unique('clubs')->ignore($id)],
            'facebook'  => ['nullable', 'url', Rule::unique('clubs')->ignore($id, 'facebook')],
            'instagram' => ['nullable', 'url', Rule::unique('clubs')->ignore($id, 'instagram')],
            'twitter'   => ['nullable', 'url', Rule::unique('clubs')->ignore($id, 'twitter')],
        ];
    }

}

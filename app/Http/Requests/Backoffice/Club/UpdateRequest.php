<?php

namespace App\Http\Requests\Backoffice\Club;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Validation\Rule;


class UpdateRequest extends BaseFormRequest
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
            'facebook'  => ['nullable', 'url', Rule::unique('clubs')->ignore($id, 'facebook')],
            'instagram' => ['nullable', 'url', Rule::unique('clubs')->ignore($id, 'instagram')],
            'twitter'   => ['nullable', 'url', Rule::unique('clubs')->ignore($id, 'twitter')],
        ];
    }

}

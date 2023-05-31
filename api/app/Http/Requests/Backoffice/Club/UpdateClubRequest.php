<?php

namespace App\Http\Requests\Backoffice\Club;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Validation\Rule;


class UpdateClubRequest extends BaseFormRequest
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
        $id = $this->route('club')->id;

        return [
            'name'      => ['sometimes','unique:clubs,name,' .$id],
            'address'   => ['sometimes'],
            'facebook'  => ['nullable', 'url', 'unique:clubs,facebook,' .$id],
            'instagram' => ['nullable', 'url', 'unique:clubs,instagram,' .$id],
            'twitter'   => ['nullable', 'url', 'unique:clubs,twitter,' .$id],
        ];
    }

}

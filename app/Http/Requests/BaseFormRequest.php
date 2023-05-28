<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class BaseFormRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        // Generate a JSON response with the validation errors and throw an
        // HttpResponseException to halt the execution of the controller.
        throw new HttpResponseException(
            response()->json(['error' => $validator->errors()], 422)
        );
    }
}


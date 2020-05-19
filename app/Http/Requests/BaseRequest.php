<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
{

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->jsonSerialize();
        foreach ($errors as $key => $error) {
            $errors[$key] = array_shift($error);
        }
        throw new HttpResponseException(redirect()->back()->withErrors($errors)->withInput());
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}

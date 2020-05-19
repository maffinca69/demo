<?php

namespace App\Http\Requests;

class ItemsGetRequest extends BaseRequest
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
            'id' => 'required|integer|exists:items,id',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'Это обязательное поле',
            '.*integer' => 'Неверное значение для поля :attribute',
            '*.exists' => 'Элемент не найден'
        ];
    }
}

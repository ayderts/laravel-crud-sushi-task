<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'filterBy' => 'required|exists:properties,name',
        ];
    }
    public function messages(): array
    {
        return             [
            'filterBy.required' => "Поле 'filterBy' является обязательным",
            'filterBy.exists' => "Такого наименования фильтра нет в базе",
        ];
    }
}

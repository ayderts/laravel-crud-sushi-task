<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'number' => 'unique:orders,number',
            'date' => 'date',
            'total_sum' => 'numeric',
        ];
    }
    public function messages()
    {
        return             [
            'date.date' => "Введите правильный формат даты",
            'total_sum.numeric' => "Поле 'Общая сумма заказа' должно быть числовым",
            'number.unique' => "Поле 'Номер заказа' должно быть уникальным",

        ];
    }
}

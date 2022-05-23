<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
            'number' => 'required|unique:orders,number',
            'fio' => 'required',
            'date' => 'required|date',
            'total_sum' => 'required|numeric',
            'delivery_address' => 'required',
        ];
    }
    public function messages()
    {
        return             [
            'number.required' => "Поле 'Номер заказа' является обязательным",
            'fio.required' => "Поле 'ФИО' является обязательным",
            'date.required' => "Поле 'Дата заказа' является обязательным",
            'date.date' => "Введите правильный формат даты",
            'total_sum.required' => "Поле 'Общая сумма заказа' является обязательным",
            'total_sum.numeric' => "Поле 'Общая сумма заказа' должно быть числовым",
            'delivery_address.required' => "Поле 'Адрес доставки' является обязательным",
            'number.unique' => "Поле 'Номер заказа' должно быть уникальным",

        ];
    }
}

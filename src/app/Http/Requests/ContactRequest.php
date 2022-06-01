<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'phone_number' => 'required',
            'user_message' => 'required'
        ];
    }
    public function messages(): array
    {
        return             [
            'name.required' => "Поле 'Имя' является обязательным",
            'email.required' => "Поле 'Электронная почта' является обязательным",
            'email.email' => "Вы ввели неверный формат почты",
            'subject.required' => "Поле 'Тема' является обязательным",
            'phone_number.required' => "Поле 'Номер телефона' является обязательным",
            'user_message.required' => "Поле 'Сообщение' является обязательным",
        ];
    }
}

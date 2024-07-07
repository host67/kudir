<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:7|max:30', //add an attribute of name="password_confirmation" to the Confirm Password text input box
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Поле Имя обязательно для заполнения',
            'email.required' => 'Поле Email обязательно для заполнения',
            'email.email' => 'Поле Email должно быть корректным email-адресом',
            'password.required' => 'Поле Пароль обязательно для заполнения',
            'password.confirmed' => 'Пароли не совпадают',
            'password.min' => 'Длина поля Пароль должна быть не менее 7 символов',
            'password.max' => 'Длина поля Пароль не должна превышать 50 символов',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Имя',
            'email' => 'Email',
            'password' => 'Пароль',
        ];
    }
}

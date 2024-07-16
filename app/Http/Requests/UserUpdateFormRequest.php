<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email is not correct',
            'password.required' => 'Password is required',
            'password.confirmed' => 'Passwords not confirmed',
            'password.min' => 'The minimum password length must be 7 characters',
            'password.max' => 'The maximum password length should not exceed 7 characters',
        ];
    }
}

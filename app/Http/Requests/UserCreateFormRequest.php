<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Dto\UserCreateDTO;

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
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:7|max:30', //add an attribute of name="password_confirmation" to the Confirm Password text input box
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email is not correct',
            'email.unique' => 'Email already exists',
            'password.required' => 'Password is required',
            'password.confirmed' => 'Passwords not confirmed',
            'password.min' => 'The minimum password length must be 7 characters',
            'password.max' => 'The maximum password length should not exceed 7 characters',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }


    /**
     * Create a UserCreateDTO from validated data.
     *
     * @return UserCreateDTO
     */
    public function getUserCreateDTO(): UserCreateDTO
    {
        $validated = $this->validated();

        return new UserCreateDTO(
            name: $validated['name'],
            email: $validated['email'],
            password: $validated['password']
        );
    }
}
